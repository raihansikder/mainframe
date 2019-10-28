<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Helpers\Modular\BaseController;

use Request;
use App\Mainframe\Traits\IsoOutput;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\GridDatatable;

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
        $this->messageBag = app('messageBag');
        $this->request = Request::capture();
    }

}