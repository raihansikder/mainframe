<?php

namespace App\Mainframe\Http\Controllers\Api;

use Auth;
use App\Mainframe\Modules\Settings\Setting;
use App\Mainframe\Http\Controllers\BaseController;

class ApiController extends BaseController
{

    protected $user;

    public function __construct()
    {

        parent::__construct();
        $this->middleware('x-auth-token'); // This is an additional safe guarding.
        $this->user = Auth::guard('x-auth')->user();

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