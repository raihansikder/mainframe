<?php

namespace App\Projects\MyProject\Http\Controllers\Api;

use App\Mainframe\Http\Controllers\Api\UserApiController as MfUserApiController;
use App\Projects\MyProject\Modules\Users\UserController;

class UserApiController extends ApiController
{

    /** @var \App\User|null|mixed */
    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->middleware('bearer-token'); // This is an additional safe guarding.

    }


    /*
    |--------------------------------------------------------------------------
    | API request handlers
    |--------------------------------------------------------------------------
    |
    | Following are the functions that handles API request. These are mapped
    | in app/Projects/MyProject/routes/api.php
    |
    */

    /**
     * Get user profile
     *
     * @return mixed
     */
    public function showUser()
    {
        //$payload = $this->user->load(['groups']);
        $payload = $this->user;

        return $this->load($payload)->json();
    }

    /**
     * Update user information
     *
     * @return mixed
     */
    public function updateUser()
    {
        return app(UserController::class)->update(request(), $this->user->id);
    }

    /**
     * Store user profile pic
     *
     * @return mixed
     */
    public function profilePicStore()
    {
        return app(MfUserApiController::class)->profilePicStore();
    }

    /**
     * Delete user profile pic
     *
     * @return mixed
     * @throws \Exception
     */
    public function profilePicDestroy()
    {
        return app(MfUserApiController::class)->profilePicDestroy();
    }



}