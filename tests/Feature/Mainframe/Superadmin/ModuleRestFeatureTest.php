<?php

namespace Tests\Feature\Mainframe\Superadmin;

use DB;
use Illuminate\Support\Str;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Samples\LoremIpsums\LoremIpsum;

class ModuleRestFeatureTest extends SuperadminTestCase
{
    /*
    |--------------------------------------------------------------------------
    | Test REST features of a module : lorem-ipsum
    |--------------------------------------------------------------------------
    |
    | Mainframe is shipped with a test module called lorem-ipsums. This test
    | ensures that all the REST functions are working perfectly.
    |
    */

    /**
     * The module name that is being tested
     *
     * @var string
     */
    public $moduleName = 'lorem-ipsums';

    /**
     * The module object
     *
     * @var \App\Mainframe\Modules\Modules\Module
     */
    public $module;

    /**
     * A sample element/entry that is used for testing.
     *
     * @var \App\Mainframe\Modules\Samples\LoremIpsums\LoremIpsum
     */

    public $element;

    /**
     * Define a element name for storing. This is used for identifying the
     * newly created item and remove it afterwards.
     *
     * @var string
     */
    public $newElementName;

    /**
     * Setup the class. This works like constructor.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->module = Module::where('name', $this->moduleName)->first();
        $this->newElementName = 'pu-'.date('YmdHi');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    | These are not actual tests rather helpers to fun the tests.
    |
    */

    /**
     * Get the element that is tested for. Usually this is the one that
     * is just created.
     *
     * @return null|\App\Mainframe\Modules\Samples\LoremIpsums\LoremIpsum|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object
     */
    public function element()
    {
        $this->element = LoremIpsum::where('name', $this->newElementName)->first();

        return $this->element;
    }
    /*
    |--------------------------------------------------------------------------
    | Test functions
    |--------------------------------------------------------------------------
    |
    | List of test functions
    |
    */
    /**
     * Superadmin can see create form.
     *
     * @return void
     */
    public function testSuperAdminCanSeeCreateForm()
    {
        $this->get('/'.$this->module->route_path.'/create')
            ->assertStatus(200)
            ->assertSee('Lorem ipsum')
        ; // A test name
    }

    /**
     * Superadmin can create a new lorem-ipsum.
     *
     * @return void
     */
    public function testSuperAdminCanCreateEntry()
    {
        $this->followingRedirects()
            ->post('/'.$this->module->name, [
                'name' => $this->newElementName
            ])
            ->assertStatus(200)
            ->assertSee('Lorem ipsum'); // A test name

    }

    /**
     * Superadmin can create a new lorem-ipsum by passing validations.
     *
     * @return void
     */
    public function testSuperAdminCreateEntryValidation()
    {
        $this->followingRedirects()
            ->post('/'.$this->module->name, [
                'name' => $this->newElementName
            ])
            ->assertStatus(200)
            ->assertSee('Fail')
            ->assertSee('The name has already been taken.');
    }

    /**
     * Superadmin can view list of lorem-ipsums
     *
     * @return void
     */
    public function testSuperAdminCanViewList()
    {
        $this->get('/'.$this->module->name)
            ->assertStatus(200)
            ->assertSee('Lorem ipsum'); // A test name

        $this->get('/'.$this->module->name.'/datatable/json')
            ->assertStatus(200)
            ->assertSee($this->newElementName); // A test name
    }

    /**
     * Superadmin can view the element as a JSON if ret=json is passed.
     *
     * @return void
     */
    public function testSuperAdminCanViewElement()
    {
        $this->followingRedirects()
            ->get("/{$this->module->name}/{$this->element()->id}")
            ->assertStatus(200)
            ->assertSee($this->newElementName); // A test name

    }

    /**
     * Superadmin can view edit page.
     *
     * @return void
     */
    public function testSuperAdminCanSeeEditPage()
    {
        $this->get("/{$this->module->name}/{$this->element()->id}/edit")
            ->assertStatus(200)
            ->assertSee($this->newElementName); // A test name
    }

    /**
     * Superadmin can update an element
     *
     * @return void
     */
    public function testSuperAdminCanUpdateElement()
    {
        $textAreaVal = Str::random();
        $this->followingRedirects()
            ->patch("/{$this->module->name}/{$this->element()->id}", [
                'textarea' => $textAreaVal
            ])
            ->assertStatus(200)
            ->assertSee('Success')
            ->assertSee($this->newElementName); // A test name
    }

    /**
     * Superadmin can delete an element
     *
     * @return void
     */
    public function testSuperAdminCanDeleteTestEntries()
    {

        // delete with redirect=success to index route.
        $this->followingRedirects()
            ->delete("/{$this->module->name}/{$this->element()->id}?redirect_success=".route('lorem-ipsums.index'))
            ->assertStatus(200)
            ->assertSee('Lorem ipsum');

        // Check if it has been soft deleted.
        $this->assertDatabaseMissing($this->module->module_table, ['name' => $this->newElementName, 'deleted_at' => null]);

        // Clean up test entries. This is messy way. But works for now.
        DB::table('lorem_ipsums')->where('name', 'LIKE', 'pu-%')->delete();
        $this->assertDatabaseMissing($this->module->module_table, ['name' => $this->newElementName]);
    }
}
