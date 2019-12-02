<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Features\Modular\BaseController;

use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\GridDatatable;
use App\Mainframe\Features\Responder\Response;
use App\Mainframe\Features\Modular\BaseController\Traits\Validable;

/**
 * Class MainframeBaseController
 */
class BaseController extends Controller
{

    use Validable;

    /** @var \Illuminate\Support\MessageBag */
    public $messageBag;

    /** * @var \App\Mainframe\Features\Responder\Response */
    public $response;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->messageBag = resolve(MessageBag::class);
        $this->response = resolve(Response::class);
    }

}
