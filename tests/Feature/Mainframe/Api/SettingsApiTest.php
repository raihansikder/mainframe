<?php

namespace Tests\Feature\Mainframe\Api;

class SettingsApiTest extends ApiTestCase
{

    /**
     * @return void
     */
    public function testGetSetting()
    {

        $this->response->get('api/1.0/setting/app-name')
            ->assertStatus(200)
            ->assertJson([
                'code' => 200,
                'status' => 'success',

            ])->assertJsonStructure([
                'code', 'status', 'message', 'data'
            ]);
    }

}
