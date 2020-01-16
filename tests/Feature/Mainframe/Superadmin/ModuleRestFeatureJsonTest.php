<?php

namespace Tests\Feature\Mainframe\Superadmin;

use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Features\Responder\Response;
use App\Mainframe\Modules\LoremIpsums\LoremIpsum;

class ModuleRestFeatureJsonTest extends SuperadminTestCase
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
        $this->newElementName = 'phpunit-test-json'.date('YmdHi');
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
     * Superadmin can create a new lorem-ipsum.
     *
     * @return void
     */
    public function testSuperAdminCanCreateEntry()
    {
        $this->post("/{$this->module->name}?ret=json", [
            'name' => $this->newElementName,
        ])
            ->assertStatus(200)
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'data' => [
                    'name' => $this->newElementName
                ],
            ]);

    }

    /**
     * Superadmin can create a new lorem-ipsum by passing validations.
     *
     * @return void
     */
    public function testSuperAdminCreateEntryValidation()
    {
        $this->post("/{$this->module->name}?ret=json", [
            'name' => $this->newElementName,
        ])
            ->assertStatus(200)
            ->assertJson([
                'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'status' => 'fail',
                'data' => [
                    'name' => $this->newElementName
                ],
                'validation_errors' => [
                    'name' => [
                        "The name has already been taken."
                    ]
                ]
            ]);
    }

    /**
     * Superadmin can view list of lorem-ipsums
     *
     * @return void
     */
    public function testSuperAdminCanViewList()
    {
        $this->get("/{$this->module->name}/list/json")
            ->assertStatus(200)
            ->assertSee($this->newElementName); // A test name
    }

    /**
     * Superadmin can view list of lorem-ipsums
     *
     * @return void
     */
    public function testSuperAdminCanViewElement()
    {
        $this->get("/{$this->module->name}/{$this->element()->id}?ret=json")
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
        $textAreaVal = \Str::random();
        $this->followingRedirects()
            ->patch("/{$this->module->name}/{$this->element()->id}?ret=json", [
                'textarea' => $textAreaVal
            ])
            ->assertStatus(200)
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'data' => [
                    'name' => $this->newElementName,
                    'textarea' => $textAreaVal
                ],
            ]);
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
            ->delete("/{$this->module->name}/{$this->element()->id}?ret=json&redirect_success=".route('lorem-ipsums.index'))
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'message' => 'Successfully deleted',
                'data' => [
                    'name' => $this->newElementName,
                ],
            ]);

        // Check if it has been soft deleted.
        $this->assertDatabaseMissing($this->module->module_table, ['name' => $this->newElementName, 'deleted_at' => null]);

        // Clean up test entries. This is messy way. But works for now.
        \DB::table('lorem_ipsums')->where('name', 'LIKE', 'phpunit%')->delete();
        $this->assertDatabaseMissing($this->module->module_table, ['name' => $this->newElementName]);
    }
}
