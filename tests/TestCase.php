<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    |
    */
    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|User|object
     */
    public function latestUser()
    {
        return User::latest()->first();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|User|object
     */
    public function lastUpdatedUser()
    {
        return User::orderBy('updated_at', 'DESC')->first();
    }

    /**
     * Get the 'date'=>... from a response
     *
     * @param $response
     * @return mixed|null
     */
    public function payload($response)
    {
        return json_decode($response->getContent(), true)['data'] ?? null;
    }

    /**
     * Get auth_token of latest user
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string|null
     */
    public function getBearerToken()
    {
        return $this->latestUser()->auth_token;
    }

}
