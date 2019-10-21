<?php

namespace App\Mainframe\Helpers;

use Response;
use Redirect;

class ControllerResponseBuilder extends ResponseBuilder
{
    /**
     * @var null|\App\Http\Mainframe\Controllers\ModuleBaseController
     */
    public $controller;
    /**
     * @var \App\Mainframe\Features\Validator\MainframeModelValidator
     */
    public $moduleValidator;
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

        $this->controller      = $controller;
        $this->moduleValidator = $controller->moduleValidator;
        $this->request         = $controller->request;
    }

    /**
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function response()
    {
        if ($this->expectsJson()) {
            return Response::json($this->prepareJson(), $this->code);
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

        if ($this->moduleValidator->validationErrors) {
            $response['validation_errors'] = $this->moduleValidator->validationErrors;
        }
        if ($this->getRedirectTo()) {
            $response['redirect'] = $this->getRedirectTo();
        }

        return $response;
    }

    /**
     *
     */
    public function redirect()
    {
        $to        = $this->getRedirectTo();
        $redirect  = Redirect::to($to);
        $validator = $this->moduleValidator->validator;

        if ($this->isFail()) {
            $redirect = $redirect->withInput();

            if ($validator) {
                $redirect = $redirect->withErrors($validator);
            }
        }

        if ($this->isSuccess()) {
            $redirect = $redirect->withInput();

            if ($validator) {
                $redirect = $redirect->withErrors($validator);
            }
        }

        return $redirect;

    }

    /**
     * @return null|mixed
     */
    public function getRedirectTo()
    {

        if ($this->redirectTo) {
            return $this->redirectTo;
        }

        if ($this->request->get('redirect')) {
            return $this->request->get('redirect');
        }

        if ($this->isSuccess()) {
            return $this->request->get('redirect_success', null);
        }

        if ($this->isFail()) {
            return $this->request->get('redirect_fail', null);
        }

        return null;

    }

}