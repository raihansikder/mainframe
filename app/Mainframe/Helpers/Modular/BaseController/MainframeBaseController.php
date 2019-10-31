<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Helpers\Modular\BaseController;

use Illuminate\Support\MessageBag;
use App\Mainframe\Traits\IsoOutput;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\GridDatatable;
use App\Mainframe\Helpers\Modular\BaseController\Traits\ResponseTrait;

/**
 * Class ModuleBaseController
 */
class MainframeBaseController extends Controller
{
    use IsoOutput, ResponseTrait;

    /** @var \Illuminate\Http\Request */
    public $request;

    /** @var \Illuminate\Support\MessageBag */
    public $messageBag;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->messageBag = resolve(MessageBag::class);
        $this->request = request();
    }

}
