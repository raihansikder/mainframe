<?php

namespace Tests;

use App\User;

abstract class ApiTestCase extends TestCase
{

    protected function setUp(): void
    {
        parent::setUp();
        $this->setApiToken()->setBearerToken();
    }

    /**
     * Get API user
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed
     */
    public function apiUser()
    {
        return User::remember('long')->find(env('API_USER_ID', 2));
    }

    /**
     * Get API X-Auth-Token
     *
     * @return mixed
     */
    public function getXAuthToken()
    {
        return $this->apiUser()->api_token;
    }

    /**
     * Set api token
     *
     * @param  null  $token
     * @param  null  $clientId
     * @return $this
     */
    public function setApiToken($token = null, $clientId = null)
    {
        $token = $token ?: $this->getXAuthToken();
        $clientId = $clientId ?: $this->apiUser()->id;
        $this->withHeaders([
            'X-Auth-Token' => $token,
            'client-id' => $clientId,
        ]);

        return $this;
    }

    /**
     * Set logged in users auth/bearer token.
     *
     * @param  null  $authToken
     * @return $this
     */
    public function setBearerToken($authToken = null)
    {
        $authToken = $authToken ?: $this->getBearerToken();

        $this->withHeaders([
            'Authorization' => 'Bearer '.$authToken,
        ]);

        return $this;
    }
}
