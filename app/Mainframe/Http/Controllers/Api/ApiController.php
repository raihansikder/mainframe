<?php

namespace App\Mainframe\Http\Controllers\Api;

use App\Mainframe\Modules\Settings\Setting;
use App\Mainframe\Http\Controllers\BaseController;

class ApiController extends BaseController
{
    public function __construct()
    {

        parent::__construct();

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