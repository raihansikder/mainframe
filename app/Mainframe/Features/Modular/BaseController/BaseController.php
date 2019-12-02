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
class BaseController extends Controller
{

    /** @var \Illuminate\Support\MessageBag */
    public $messageBag;

    /** * @var \App\Mainframe\Features\Responder\Response */
    public $response;

    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->messageBag = resolve(MessageBag::class);
        $this->response = resolve(Response::class);
    }

    /**
     * @return mixed|Response
     */
    public function response()
    {
        return $this->response;
    }

    /**
     * Determine validator
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validator()
    {
        if ($this->validator) {
            return $this->validator;
        }

        $this->validator = Validator::make([], []);

        return $this->validator;
    }


    /**
     * Invalidate with a key and error message
     *
     * @param  null  $key
     * @param  null  $message
     * @return $this
     */
    public function invalidate($key = null, $message = null)
    {
        $this->addError($key, $message);
        $this->fail();

        return $this;
    }

    /**
     * Add an error message to a key-value pair
     *
     * @param  null  $key
     * @param  null  $message
     */
    public function addError($key = null, $message = null)
    {
        $this->validator()->messages()->add($key, $message);
    }

}
