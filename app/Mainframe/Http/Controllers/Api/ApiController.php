<?php

namespace App\Mainframe\Http\Controllers\Api;

use App\Mainframe\Http\Controllers\Api\Traits\ApiControllerTrait;
use App\Mainframe\Modules\Settings\Setting;
use App\Mainframe\Http\Controllers\BaseController;

class ApiController extends BaseController
{
    use ApiControllerTrait;

    protected $user;

    public function __construct()
    {
        parent::__construct();

        $this->middleware('tenant'); // Commonly check tenant context for all API call
        $this->user->refresh(); // Useful for bearer because token may get updated.
        $this->injectUserIdentityInRequest();

    }

}