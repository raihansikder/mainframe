<?php

namespace Tests;

use App\User;

trait TestHelperTrait
{
    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|User|object
     */
    public function latestUser()
    {
        return $this->latest(User::class);
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
     *
     * @return \Illuminate\Database\Eloquent\HigherOrderBuilderProxy|mixed|string|null
     */
    public function getBearerToken()
    {
        return $this->latestUser()->auth_token;
    }

    /**
     * Get last created model
     *
     * @param  $class
     * @return \App\Mainframe\Features\Modular\BaseModule\BaseModule|null
     */
    public function latest($class)
    {
        return $class::latest()->first();
    }

    /**
     * Get last updated model
     *
     * @param  $class
     * @return \App\Mainframe\Features\Modular\BaseModule\BaseModule|null
     */
    public function lastUpdate($class)
    {
        return $class::orderBy('updated_at', 'DESC')->first();
    }
}