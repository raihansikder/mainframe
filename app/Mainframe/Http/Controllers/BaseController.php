<?php

namespace App\Mainframe\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mainframe\Features\Core\Traits\SendResponse;
use App\Mainframe\Features\Core\Traits\Validable;
use App\Mainframe\Features\Core\ViewProcessor;
use View;

/**
 * Class MainframeBaseController
 */
class BaseController extends Controller
{
    use Validable, SendResponse;

    /** @var \App\User|null */
    protected $user;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor */
    protected $view;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->user = user();
        $this->view = new ViewProcessor();
        View::share([
            'user' => $this->user,
            'view' => $this->view,
        ]);
    }

}