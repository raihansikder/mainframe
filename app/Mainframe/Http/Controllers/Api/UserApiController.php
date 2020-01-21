<?php

namespace App\Mainframe\Http\Controllers\Api;

use Request;
use App\Mainframe\Modules\Users\UserController;

class UserApiController extends ApiController
{

    /** @var \App\Mainframe\Modules\Users\User|null|mixed */
    protected $user;

    public function __construct()
    {
        parent::__construct();



        $this->user = bearer();

        $this->injectUserIdentityInRequest();

    }

    /**
     * Add a user parameter in the request
     */
    public function injectUserIdentityInRequest()
    {
        if ($this->user) {
            Request::merge(['user_id' => $this->user->id]);
        }
    }

    /**
     * Test Api
     *
     * @return mixed
     */
    public function profile()
    {
        return $this->response()->load($this->user)->json();
    }

    /**
     * Update user
     *
     * @return mixed|\App\Mainframe\Modules\Users\User
     */
    public function update()
    {
        return app(UserController::class)->update(request(), $this->user->id);
    }

}