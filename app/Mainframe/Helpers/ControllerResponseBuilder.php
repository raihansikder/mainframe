<?php

namespace App\Mainframe\Helpers;

use Request;
use Response;

class ControllerResponseBuilder extends ResponseBuilder
{
    /**
     * @var null|\App\Http\Mainframe\Controllers\ModuleBaseController
     */
    public $controller;
    /**
     * @var \App\Mainframe\Features\Validator\MainframeModelValidator
     */
    public $validator;
    /**
     * @var \Illuminate\Http\Request
     */
    public $request;
    /** @var string */
    public $redirectTo;

    /**
     * ResponseBuilder constructor.
     *
     * @param  \App\Http\Mainframe\Controllers\ModuleBaseController| null  $controller
     */
    public function __construct($controller = null)
    {
        parent::__construct();

        $this->controller = $controller;
        $this->validator  = $controller->validator;
        $this->request    = $controller->request;
    }

    /**
     * @return bool
     */
    public function expectsJson()
    {
        if (Request::expectsJson()) {
            return true;
        }

        if (Request::get('ret') === 'json') {
            return true;
        }

        return false;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function response()
    {
        if ($this->expectsJson()) {
            return $this->sendJson($this->prepareJson(), $this->code);
        }

        return $this->redirect();
    }

    /**
     * @return array
     */
    public function prepareJson()
    {
        $response = [
            'status'  => $this->status,
            'message' => $this->message
        ];
        if ($this->payload) {
            $response['data'] = $this->payload;
        }
        if ($this->redirectTo()) {
            $response['redirect'] = $this->redirectTo();
        }

        return $response;
    }

    /**
     * @param $response
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendJson($response, $code)
    {
        return Response::json($response, $code);
    }

    /**
     *
     */
    public function redirect()
    {
        return $this->redirectTo();
    }

    /**
     * @return null|mixed
     */
    public function redirectTo()
    {

        if ($this->redirectTo) {
            return $this->redirectTo;
        }

        if ($this->request->get('redirect')) {
            return $this->request->get('redirect');
        }

        if ($this->status === 'success') {
            return $this->request->get('redirect_success', null);
        }

        if ($this->status === 'fail') {
            return $this->request->get('redirect_fail', null);
        }

        return null;

    }

}