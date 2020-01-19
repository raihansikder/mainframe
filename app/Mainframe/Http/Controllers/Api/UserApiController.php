<?php

namespace App\Mainframe\Http\Controllers\Api;

use Request;
use App\Mainframe\Modules\Settings\SettingController;

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
        Request::merge(['user_id' => $this->user->id]);
    }

    /**
     * Test Api
     *
     * @return mixed
     */
    public function test()
    {
        return app(SettingController::class)->index();
    }

}