<?php

namespace App\Mainframe\Http\Controllers\Api;

use App\Mainframe\Modules\Settings\Setting;
use App\Mainframe\Http\Controllers\BaseController;

class ApiController extends BaseController
{

    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->middleware('x-auth-token'); // This is an additional safe guarding.
        # Load current user
        // $this->user = user(); // $this->user = Auth::guard('x-auth')->user();
        $this->user->refresh(); // Useful for bearer because token may get updated.
        $this->injectUserIdentityInRequest();

    }

    /**
     * Add a user parameter in the request
     */
    public function injectUserIdentityInRequest()
    {
        // Merge tenant identity in request
        if ($this->user->tenant_id) {
            request()->merge(['tenant_id' => $this->user->tenant_id]);
        }

        if ($this->user->id) {
            request()->merge(['user_id' => $this->user->id]);
        }

    }

    /**
     * Get the setting value from name(key)
     *
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSetting($name)
    {

        if ($val = Setting::read($name)) {
            return $this->load($val)->json();
        }

        return $this->fail()->json();
    }

}