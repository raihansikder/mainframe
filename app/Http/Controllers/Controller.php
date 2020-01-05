<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Mainframe\Features\Core\Traits\Validable;
use Illuminate\Routing\Controller as BaseController;
use App\Mainframe\Features\Core\Traits\SendResponse;
use App\Mainframe\Features\Core\Traits\HasMessageBag;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests,
        Validable, SendResponse, HasMessageBag;
}
