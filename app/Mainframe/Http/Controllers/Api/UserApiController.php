<?php

namespace App\Mainframe\Http\Controllers\Api;

use Auth;
use Request;
use App\Mainframe\Modules\Users\UserController;

class UserApiController extends ApiController
{

    /** @var \App\User|null|mixed */
    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->middleware('bearer-token');
        $this->user = Auth::guard('bearer')->user();

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
     * Get user profile
     *
     * @return mixed
     */

    public function profile()
    {

        $payload = $this->user->load(['groups'])
            ->makeHidden(['group_ids', 'is_test']);

        return $this->load($payload)->send();
    }

    /**
     * Update user
     *
     * @return mixed|\App\User
     */
    public function update()
    {
        return app(UserController::class)->update(request(), $this->user->id);
    }

}