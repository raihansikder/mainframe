<?php

namespace Tests\Feature\Mainframe\Superadmin;

use App\Setting;
use App\Module;

class SettingsModuleRestFeatureTest extends SuperadminTestCase
{
    /**
     * The module name that is being tested
     *
     * @var string
     */
    public $moduleName = 'settings';

    /**
     * @var \App\Mainframe\Modules\Modules\Module
     */
    public $module;
    /**
     * A sample element/entry that is used for testing.
     *
     * @var Setting
     */

    /**
     * Setup the class. This works like constructor.
     */
    protected function setUp(): void
    {
        parent::setUp();
        /** @noinspection PhpUndefinedMethodInspection */
        $this->module = Module::where('name', $this->moduleName)->remember(timer('long'))->first();
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
    public function test_user_can_see_create_form()
    {
        $this->get('/'.$this->module->route_path.'/create')
            ->assertStatus(200)
            ->assertSee($this->module->title);
    }

    /**
     * Superadmin can create a new Setting by passing validations.
     *
     * @return void
     */
    public function test_user_can_not_store_invalid_element()
    {
        $name = $this->faker->slug;
        $this->followingRedirects()
            ->post('/'.$this->module->name, [
                'name' => $name,
            ])
            ->assertStatus(200)
            ->assertSee('Fail')
            ->assertSee('The title field is required.')
            ->assertSee('The type field is required');
    }

    public function test_user_can_store_valid_element()
    {
        $name = $this->faker->slug;
        $this->followingRedirects()
            ->post('/'.$this->module->name, [
                'name' => $name,
                'title' => strtoupper($name),
                'type' => 'string',
                'value' => $this->faker->sentence,
                'description' => $this->faker->sentence,
            ])
            ->assertStatus(200)
            ->assertSee('Success');
    }

    public function test_user_can_not_store_element_of_same_name()
    {
        $latest = $this->latest(Setting::class);

        $this->followingRedirects()
            ->post('/'.$this->module->name, [
                'name' => $latest->name,
                'title' => strtoupper($latest->name),
                'type' => 'string',
                'value' => $this->faker->sentence,
                'description' => $this->faker->sentence,
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
    public function test_user_can_view_list()
    {
        $latest = $this->latest(Setting::class);

        $this->get('/'.$this->module->name)
            ->assertStatus(200)
            ->assertSee($this->module->title);

        $this->get('/'.$this->module->name.'/datatable/json')
            ->assertStatus(200)
            ->assertSee($latest->name);
    }

    /**
     * Superadmin can view the element as a JSON if ret=json is passed.
     *
     * @return void
     */
    public function test_user_can_view_element()
    {
        $latest = $this->latest(Setting::class);

        $this->followingRedirects()
            ->get("/{$this->module->name}/{$latest->id}")
            ->assertStatus(200)
            ->assertSee($latest->name);

    }

    /**
     * Superadmin can view edit page.
     *
     * @return void
     */
    public function test_user_can_edit_element()
    {
        $latest = $this->latest(Setting::class);

        $this->get("/{$this->module->name}/{$latest->id}/edit")
            ->assertStatus(200)
            ->assertSee($latest->name);

    }

    /**
     * Superadmin can update an element
     *
     * @return void
     */
    public function test_user_can_update_element()
    {
        $latest = $this->latest(Setting::class);
        $newValue = $this->faker->sentence;

        $this->followingRedirects()
            ->patch("/{$this->module->name}/{$latest->id}", [
                'value' => $newValue,
            ])
            ->assertStatus(200)
            ->assertSee('Success')
            ->assertSee($newValue);

    }

    /**
     * Superadmin can delete an element
     *
     * @return void
     */
    public function test_user_can_delete_element()
    {
        // Note: The element got deleted earlier so had to add a delay for deletion so that
        //  other tests can run and then the delete is executed.
        // $this->markTestSkipped('Skipped because it executes and makes the element inaccessible');
        // sleep(1);
        // ------------------------------------------------------------------------------------------

        $latest = $this->latest(Setting::class);

        // delete with redirect=success to index route.
        $this->followingRedirects()
            ->delete("/{$this->module->name}/{$latest->id}?redirect_success=".route($this->module->name.'.index'))
            ->assertStatus(200)
            ->assertSee($this->module->title);

        // Check if it has been soft deleted.
        $this->assertDatabaseMissing($this->module->module_table, ['id' => $latest->id, 'deleted_at' => null]);

    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    | These are not actual tests rather helpers to fun the tests.
    |
    */

}
