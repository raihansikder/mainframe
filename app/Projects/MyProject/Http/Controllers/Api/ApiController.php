<?php

namespace App\Projects\MyProject\Http\Controllers\Api;

use App\Mainframe\Http\Controllers\Api\ApiController as MfApiController;
use App\Projects\MyProject\Modules\Quotes\Quote;
use App\Projects\MyProject\Modules\Orders\Order;
use App\Projects\MyProject\Modules\Users\User;

class ApiController extends MfApiController
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add a user parameter in the request
     */
    public function injectUserIdentityInRequest()
    {
        // if ($this->user->ofReseller()) {
        //     request()->merge(['reseller_id' => $this->user->reseller_id]);
        // }
    }

}