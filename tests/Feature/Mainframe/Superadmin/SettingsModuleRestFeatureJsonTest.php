<?php

namespace Tests\Feature\Mainframe\Superadmin;

use App\Module;
use App\Mainframe\Features\Responder\Response;
use App\Setting;
use Faker\Factory;
use Faker\Generator;

class SettingsModuleRestFeatureJsonTest extends SuperadminTestCase
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

    /**
     * Superadmin can create a new element.
     */
    public function test_user_can_not_store_invalid_element()
    {
        $name = $this->faker->slug;
        $response = $this->post("/{$this->module->name}?ret=json",
            [
                'name' => $name,
            ]);

        $response->assertStatus(200)
            ->assertJson([
                'code' => 422,
                'status' => 'fail',
                'errors' => [
                    "Failed to create new Setting",
                    "The title field is required.",
                    "The type field is required.",
                ],
            ]);
    }

    /**
     * Superadmin can create a new element.
     */
    public function test_user_can_store_valid_element()
    {
        $name = $this->faker->slug;
        $this->post("/{$this->module->name}?ret=json",
            [
                'name' => $name,
                'title' => strtoupper($name),
                'type' => 'string',
                'value' => $this->faker->sentence,
                'description' => $this->faker->sentence,
            ])
            ->assertStatus(200)
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'data' => [
                    'name' => $name,
                ],
            ]);

    }

    /**
     * Superadmin can create a new lorem-ipsum by passing validations.
     */
    public function test_user_can_not_store_element_of_same_name()
    {
        $latest = $this->latest(Setting::class);

        $this->post("/{$this->module->name}?ret=json",
            [
                'name' => $latest->name,
                'title' => strtoupper($latest->name),
                'type' => 'string',
                'value' => $this->faker->sentence,
                'description' => $this->faker->sentence,
            ])
            ->assertStatus(200)
            ->assertJson([
                'code' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'status' => 'fail',
                'data' => [
                    'name' => $latest->name,
                ],
                'validation_errors' => [
                    'name' => [
                        "The name has already been taken.",
                    ],
                ],
            ]);
    }

    /**
     * Superadmin can view list of lorem-ipsums
     */
    public function test_user_can_view_list()
    {
        $latest = $this->latest(Setting::class);

        $this->get("/{$this->module->name}/list/json")
            ->assertStatus(200)
            ->assertSee($latest->name);
    }

    /**
     * Superadmin can view list of lorem-ipsums
     */
    public function test_user_can_view_element()
    {
        $latest = $this->latest(Setting::class);

        $this->get("/{$this->module->name}/{$latest->id}?ret=json")
            ->assertStatus(200)
            ->assertSee($latest->name);
    }

    /**
     * Superadmin can update an element
     */
    public function test_user_can_update_element()
    {
        $latest = $this->latest(Setting::class);
        $newValue = $this->faker->sentence;

        $this->followingRedirects()
            ->patch("/{$this->module->name}/{$latest->id}?ret=json",
                [
                    'value' => $newValue,
                ])
            ->assertStatus(200)
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'data' => [
                    'name' => $latest->name,
                    'value' => $newValue,
                ],
            ]);
    }

    /**
     * Superadmin can delete an element
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
            ->delete("/{$this->module->name}/{$latest->id}?ret=json&redirect_success=".route($this->module->name.'.index'))
            ->assertJson([
                'code' => 200,
                'status' => 'success',
                'message' => "The {$this->module->title} is deleted",
                'data' => [
                    'name' => $latest->name,
                ],
            ]);

        // Check if it has been soft deleted.
        $this->assertDatabaseMissing($this->module->module_table, ['id' => $latest->id, 'deleted_at' => null]);

    }

}
