<?php

namespace App\Mainframe\Http\Controllers\Api\Traits;

use App\Setting;

trait ApiControllerTrait
{
    /**
     * Add a user parameter in the request
     */
    public function injectUserIdentityInRequest()
    {
        // Merge tenant identity in request
        if (isset($this->user->tenant_id)) {
            request()->merge(['tenant_id' => $this->user->tenant_id]);
        }

        if (isset($this->user->id)) {
            request()->merge(['user_id' => $this->user->id]);
        }

    }

    /**
     * Get setting by name(key)
     *
     * @param $name
     * @return \Illuminate\Http\JsonResponse
     * @group Settings
     */
    public function getSetting($name)
    {

        if ($val = Setting::read($name)) {
            return $this->load($val)->json();
        }

        return $this->fail()->json();
    }
}