<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Http\Mainframe\Controllers;

use View;
use Request;
use Illuminate\Support\MessageBag;
use App\Mainframe\Traits\IsoOutput;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\GridDatatable;
use App\Mainframe\Traits\ModuleBaseController\Transformable;
use App\Mainframe\Traits\ModuleBaseController\ResponseTrait;
use App\Mainframe\Traits\ModuleBaseController\PermissionsTrait;

/**
 * Class ModuleBaseController
 */
class MainframeBaseController extends Controller
{
    use IsoOutput, Transformable, ResponseTrait, PermissionsTrait;

    /** @var \Illuminate\Http\Request */
    public $request;

    /** @var \Illuminate\Support\MessageBag */
    public $messageBag;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {

        $this->messageBag = new MessageBag();
        $this->request = Request::capture();
        View::share([
            'request' => $this->request,
            'messageBag' => $this->messageBag,
        ]);

    }

}
