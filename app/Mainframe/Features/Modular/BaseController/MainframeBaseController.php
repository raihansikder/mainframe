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

/**
 * Class MainframeBaseController
 */
class MainframeBaseController extends Controller
{

    /** @var \Illuminate\Support\MessageBag */
    public $messageBag;
    /**
     * @var \App\Mainframe\Features\Responder\Response
     */
    public $response;

    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->messageBag = resolve(MessageBag::class);
    }

    /**
     * @return mixed|Response
     */
    public function response()
    {
        /** @noinspection UnknownInspectionInspection */
        /** @noinspection DuplicatedCode */
        $response = resolve(Response::class);
        $response->validator = $this->validator;
        // $response->code = $response->code ?: $this->code;
        // $response->status = $response->status ?: $this->status;
        // $response->message = $response->message ?: $this->message;
        // $response->payload = $response->payload ?: $this->payload;
        // $response->redirectTo = $response->redirectTo ?: $this->redirectTo;

        return $response;
    }

}
