<?php

namespace App\Mainframe\Features\Core\Traits;

use URL;
use App\Mainframe\Features\Responder\Response;

/** @mixin  \App\Mainframe\Http\Controllers\BaseController $this */
trait SendResponse
{
    /** * @var \App\Mainframe\Features\Responder\Response */
    public $response;

    protected $redirectTo;

    /**
     * @param  \Illuminate\Validation\Validator|null  $validator
     * @return mixed|Response
     */
    public function response($validator = null)
    {
        /** @var Response $response */
        $this->response = resolve(Response::class);
        if ($validator) {
            $this->response->validator = $validator;
        }

        return $this->response;
    }

    /**
     * Try to figure out where to redirect
     *
     * @return array|\Illuminate\Http\Request|string
     */
    public function redirectTo()
    {
        $successTo = request('redirect_success');
        $failTo = request('redirect_fail');

        if ($this->response()->isSuccess() && $successTo) {

            if (isset($this->element, $this->module) && $successTo == '#new') {
                return route($this->module->name.".edit", $this->element->id);
            }

            return $successTo;
        }

        if ($this->response()->isFail() && $failTo) {
            return $failTo;
        }

        return $this->redirectTo ?: URL::full();
    }

    /**
     * Build a success response.
     *
     * @param  null  $message
     * @param  int  $code
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function success($message = null, $code = Response::HTTP_OK)
    {
        return $this->response()->success($message, $code);
    }

    /**
     * Build a fail response.
     *
     * @param  null  $message
     * @param  int  $code
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function fail($message = null, $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return $this->response()->fail($message, $code);
    }

}