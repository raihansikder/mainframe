<?php

namespace App\Projects\MyProject\Http\Controllers;

use App\Mainframe\Http\Controllers\BaseController as MainframeBaseController;
use App\Projects\MyProject\Features\Core\ViewProcessor;
use View;

/**
 * Class MainframeBaseController
 */
class BaseController extends MainframeBaseController
{

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->user = user();
        $this->view = new ViewProcessor();

        View::share([
            'user' => $this->user,
            'view' => $this->view,
        ]);
    }
}