<?php

namespace Tests\Feature\Mainframe\Api;

class SettingsApiTest extends ApiTestCase
{

    /**
     * @return void
     */
    public function test_get_setting_by_key()
    {

        $key = 'app-name';
        $this->get("api/1.0/setting/{$key}")
            ->assertStatus(200)
            ->assertJson([
                'code' => 200,
                'status' => 'success',

            ])->assertJsonStructure([
                'code', 'status', 'message', 'data',
            ]);
    }

}
