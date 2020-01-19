<?php

namespace Tests\Feature\Mainframe\Api;

use Tests\TestCase;
use App\Mainframe\Modules\Users\User;

class ApiTestCase extends TestCase
{

    public $response;
    public $user;
    public $clientId;
    public $xAuthToken;

    protected function setUp(): void
    {
        parent::setUp();

        $this->clientId = 2;
        $this->user = User::find($this->clientId);
        $this->xAuthToken = $this->user->api_token;

        $this->be($this->user); // Impersonate as the currently created admin user

        $this->response = $this->withHeaders(
            [
                'X-Auth-Token' => $this->xAuthToken,
                'client-id' => $this->clientId,
            ]
        );

    }



}
