<?php

namespace App\Mainframe\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mainframe\Features\Core\Traits\SendResponse;
use App\Mainframe\Features\Core\Traits\Validable;
use View;

/**
 * Class MainframeBaseController
 */
class BaseController extends Controller
{
    use Validable, SendResponse;

    /** @var \App\User|null */
    protected $user;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->user = user();
        View::share(['user' => $this->user]);
    }

}