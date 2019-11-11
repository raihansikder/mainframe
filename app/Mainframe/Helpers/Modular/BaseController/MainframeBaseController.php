<?php
/** @noinspection PhpUndefinedClassInspection */
/** @noinspection NotOptimalIfConditionsInspection */
/** @noinspection PhpParamsInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Helpers\Modular\BaseController;

use Illuminate\Support\MessageBag;
use App\Http\Controllers\Controller;
use App\Mainframe\Traits\GridDatatable;
use App\Mainframe\Helpers\Responder\Response;
use App\Mainframe\Helpers\Modular\BaseController\Traits\ResponseTrait;

/**
 * Class MainframeBaseController
 */
class MainframeBaseController extends Controller
{
    // use  ResponseTrait;

    /** @var \Illuminate\Http\Request */
    // public $request;
    /** @var \Illuminate\Support\MessageBag */
    public $messageBag;
    /**
     * @var \App\Mainframe\Helpers\Responder\Response
     */
    public $response;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->messageBag = resolve(MessageBag::class);
        // $this->request = request();
        // $this->response = new Response();
    }

    public function response()
    {
        /** @noinspection UnknownInspectionInspection */
        /** @noinspection DuplicatedCode */
        $response = resolve(Response::class);
        // $response->code = $response->code ?: $this->code;
        // $response->status = $response->status ?: $this->status;
        // $response->message = $response->message ?: $this->message;
        // $response->payload = $response->payload ?: $this->payload;
        // $response->redirectTo = $response->redirectTo ?: $this->redirectTo;

        return $response;
    }

}
