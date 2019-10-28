<?php
/** @noinspection UnknownInspectionInspection */
/** @noinspection PhpUndefinedFieldInspection */
/** @noinspection DuplicatedCode */

namespace App\Mainframe\Helpers\Modular\BaseController\Traits;

use Response;
use Redirect;

trait ResponseTrait
{

    /** @var int */
    public $code;
    /** @var string */
    public $status;
    /** @var string */
    public $message;
    /** @var mixed */
    public $payload;
    /** @var string */
    public $view;
    /** @var string */
    public $redirectTo;

    /**
     * @return bool
     */

    /**
     * @return bool
     */
    public function expectsJson()
    {
        /** @var $this \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController */
        if ($this->request->expectsJson()) {
            return true;
        }

        /** @var $this \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController */
        return $this->request->get('ret') === 'json';
    }

    /**
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function permissionDenied($message = 'Permission denied', $code = 403)
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|self $this */
        $this->fail($message, $code);
        if ($this->expectsJson()) {
            /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|self $this */
            return $this->json();
        }

        return abort($code, $message);
    }

    /**
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function notFound($message = 'Item not found', $code = 403)
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|self $this */
        $this->fail($message, $code);
        if ($this->expectsJson()) {
            /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|self $this */
            return $this->json();
        }

        return abort($code, $message);
    }

    public function success($message = 'Request is successful', $code = 200)
    {
        if ($this->status !== 'fail') {
            $this->code = $code;
            $this->status = 'success';
            $this->message = $message;
        }

        return $this;
    }

    public function fail($message = 'Operation failed', $code = 404)
    {
        if ($this->status !== 'fail') {
            $this->code = $code;
            $this->status = 'fail';
            $this->message = $message;
        }

        return $this;
    }

    public function isSuccess()
    {
        return $this->status === 'success';
    }

    public function isFail()
    {
        return ! $this->isSuccess();
    }

    public function payload($payload = null)
    {
        $this->payload = $payload;

        return $this;
    }

    public function json()
    {
        return Response::json($this->prepareJson(), $this->code);
    }

    /**
     * @return array
     */
    public function prepareJson()
    {
        $response = [
            'code' => $this->code,
            'status' => $this->status,
            'message' => $this->message
        ];
        if ($this->payload) {
            $response['data'] = $this->payload;
        }

        if (isset($this->modelValidator, $this->modelValidator->validator)) {
            $response['validation_errors'] = json_decode($this->modelValidator->validator->messages(), true);
        }
        $response['redirect'] = $this->getRedirectTo();

        return $response;
    }

    /**
     *
     */
    public function redirect()
    {
        $to = $this->getRedirectTo();

        $redirect = $to ? Redirect::to($to) : Redirect::back();
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|self $this */
        $validator = $this->modelValidator->validator;

        if ($this->isFail()) {
            $redirect = $redirect->withInput();

            if ($validator) {
                $redirect = $redirect->withErrors($validator);
            }
        }

        return $redirect->with([
            'status' => $this->status,
            'message' => $this->message,
        ]);
    }

    /**
     * @return null|mixed
     */
    public function getRedirectTo()
    {
        if ($this->isSuccess()) {
            /** @var $this \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController */
            $this->redirectTo = $this->request->get('redirect_success');

            if ($this->redirectTo === '#new' && $this->element) {
                return route($this->moduleName.".edit", $this->element->id);
            }
        }

        if ($this->isFail()) {
            /** @var $this \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController */
            $this->redirectTo = $this->request->get('redirect_fail');

            if ($this->redirectTo === '#new' && $this->element) {
                return route($this->moduleName.".edit", $this->element->id);
            }
        }

        return $this->redirectTo;
    }

}