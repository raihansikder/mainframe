<?php
/**
 * User/Bearer API
 */

namespace App\Mainframe\Http\Controllers\Api;

use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Users\UserController;
use App\Mainframe\Modules\Uploads\UploadController;

class UserApiController extends ApiController
{

    /** @var \App\User|null|mixed */
    protected $user;

    public function __construct()
    {
        parent::__construct();
        $this->middleware('bearer-token');
        $this->middleware('tenant');
    }

    /**
     * Add a user parameter in the request
     */
    public function injectUserIdentityInRequest()
    {
        if (isset($this->user->id)) {
            request()->merge(['user_id' => $this->user->id]);
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

    /**
     * Store user profile pic
     *
     * @return mixed
     */
    public function profilePicStore()
    {
        request()->merge([
            'module_id'  => Module::byName('users')->id,
            'element_id' => $this->user->id,
            'type'       => 'profile-pic',
        ]);

        return app(UploadController::class)->store(request());
    }

    /**
     * Delete user profile pic
     *
     * @return mixed
     * @throws \Exception
     */
    public function profilePicDestroy()
    {
        $upload = $this->user->uploads->where('type', 'profile-pic')->first();
        if ($upload) {
            return app(UploadController::class)->destroy($upload->id);
        }

        return $this->notFound();
    }
}