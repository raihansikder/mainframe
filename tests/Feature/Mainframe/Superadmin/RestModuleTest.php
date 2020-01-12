<?php

namespace Tests\Feature\Mainframe\Superadmin;

use DB;
use Illuminate\Support\Str;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\LoremIpsums\LoremIpsum;

class RestModuleTest extends SuperadminTestCase
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

    /** * @var \App\Mainframe\Modules\Modules\Module */
    public $module;
    /** * @var \App\Mainframe\Modules\LoremIpsums\LoremIpsum */
    public $element;
    /** @var string */
    public $newElementName;

    public function setUp(): void
    {
        parent::setUp();

        $this->module = Module::where('name', 'lorem-ipsums')->first();
        $this->newElementName = 'phpunit-test-'.date('YmdHi');
    }

    /**************************************************************
     * Helpers
     *************************************************************/

    public function element()
    {
        $this->element = LoremIpsum::where('name', $this->newElementName)->first();

        return $this->element;
    }
    /**************************************************************
     * Test functions
     *************************************************************/
    /**
     * Superadmin can see create form.
     *
     * @return void
     */
    public function testSuperAdminCanSeeCreateForm()
    {
        $this->get('/'.$this->module->name.'/create')
            ->assertStatus(200)
            ->assertSee('Lorem ipsum'); // A test name
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
            ->assertSee('Validation failed') // A test name
            ->assertSee('The name has already been taken.'); // A test name
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
    public function testSuperAdminCanViewElementJson()
    {
        $this->get("/{$this->module->name}/{$this->element()->id}?ret=json")
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
        $this->assertDatabaseMissing($this->module->tableName(), ['name' => $this->newElementName, 'deleted_at' => null]);

        // Clean up test entries. This is messy way. But works for now.
                DB::table('lorem_ipsums')->where('name', 'LIKE', 'phpunit%')->delete();
        $this->assertDatabaseMissing($this->module->tableName(), ['name' => $this->newElementName]);
    }
}
