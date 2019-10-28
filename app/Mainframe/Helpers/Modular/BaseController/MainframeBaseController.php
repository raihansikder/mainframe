<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Helpers\Modular\BaseController;

use Request;
use Illuminate\Support\MessageBag;
use App\Mainframe\Traits\IsoOutput;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\GridDatatable;
use App\Mainframe\Helpers\Modular\BaseController\Traits\ResponseTrait;
use App\Mainframe\Helpers\Modular\BaseController\Traits\Transformable;

/**
 * Class ModuleBaseController
 */
class MainframeBaseController extends Controller
{
    use IsoOutput, Transformable, ResponseTrait;

    /** @var \Illuminate\Http\Request */
    public $request;

    /** @var \Illuminate\Support\MessageBag */
    public $messageBag;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->messageBag = app(MessageBag::class);
        $this->request = Request::capture();
    }

}
