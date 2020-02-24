<?php

namespace App\Mainframe\Http\Controllers;

use View;
use App\Http\Controllers\Controller;
use App\Mainframe\Features\Core\Traits\Validable;
use App\Mainframe\Features\Core\Traits\SendResponse;
use App\Mainframe\Features\Core\Traits\HasMessageBag;

/**
 * Class MainframeBaseController
 */
class BaseController extends Controller
{
    use Validable, SendResponse, HasMessageBag;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        View::share(['user' => user()]);
    }

}