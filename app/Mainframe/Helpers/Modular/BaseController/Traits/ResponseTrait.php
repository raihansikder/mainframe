<?php
/** @noinspection UnknownInspectionInspection */
/** @noinspection PhpUndefinedFieldInspection */
/** @noinspection DuplicatedCode */

namespace App\Mainframe\Helpers\Modular\BaseController\Traits;

use Response;
use Redirect;

/** @mixin \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController */
trait ResponseTrait
{

    /** @var int Success/Error codes 200.400 etc */
    public $code;

    /** @var string success|fail */
    public $status;

    /** @var string Single line of message */
    public $message;

    /** @var mixed API payload, usually it is a list of a model */
    public $payload;

    /** @var string */
    public $redirectTo;

    /**
     * Checks if the response expects JSON
     *
     * @return bool
     */
    public function expectsJson()
    {
        if ($this->request->expectsJson()) {
            return true;
        }

        return $this->request->get('ret') === 'json';
    }

    public function responseFail($message = 'Operation failed', $code = 400)
    {
        $this->fail($message, $code);

        if ($this->expectsJson()) {
            return $this->json();
        }

        return abort($code, $message);
    }

    /**
     * Abort on permission denial
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function responsePermissionDenied($message = 'Permission denied', $code = 403)
    {
        return $this->responseFail($message, $code);
    }

    /**
     * Abort on resource not found
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function responseNotFound($message = 'Item not found', $code = 404)
    {
        return $this->responseFail($message, $code);
    }

    /**
     * Set response as success
     *
     * @param  string  $message
     * @param  int  $code
     * @return $this
     */
    public function success($message = 'Request is successful', $code = 200)
    {
        if ($this->status !== 'fail') {
            $this->code = $code;
            $this->status = 'success';
            $this->message = $message;
        }

        return $this;
    }

    /**
     * Set response as fail
     *
     * @param  string  $message
     * @param  int  $code
     * @return $this
     */
    public function fail($message = 'Operation failed', $code = 404)
    {
        if ($this->status !== 'fail') {
            $this->code = $code;
            $this->status = 'fail';
            $this->message = $message;
        }

        return $this;
    }

    /**
     * Check if response is success
     *
     * @return bool
     */
    public function isSuccess()
    {
        return $this->status === 'success';
    }

    /**
     * Check if response is fail
     *
     * @return bool
     */
    public function isFail()
    {
        return ! $this->isSuccess();
    }

    /**
     * Load a payload to be sent with the response
     *
     * @param  null  $payload
     * @return $this
     */
    public function payload($payload = null)
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * Send Json response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function json()
    {
        return Response::json($this->prepareJson(), $this->code);
    }

    /**
     * Prepare the array for JSON response.
     *
     * @return array
     */
    public function prepareJson()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $controller */
        $controller = $this;

        $response = [
            'code' => $this->code,
            'status' => $this->status,
            'message' => $this->message
        ];
        if ($this->payload) {
            $response['data'] = $this->payload;
        }

        /** @Var ModuleBaseController|this $this */
        if (isset($controller->validator, $controller->validator->validator)
            && $controller->validator->validator->fails()) {
            $response['validation_errors'] = json_decode($controller->validator->validator->messages(), true);
        }

        if ($controller->getRedirectTo()) {
            $response['redirect'] = $controller->getRedirectTo();
        }

        return $response;
    }

    /**
     *
     */
    public function redirect()
    {
        $to = $this->getRedirectTo();

        $redirect = $to ? Redirect::to($to) : Redirect::back();

        $validator = $this->validator->validator;

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
            $this->redirectTo = $this->request->get('redirect_success');

            if ($this->redirectTo === '#new' && $this->element) {
                return route($this->moduleName.".edit", $this->element->id);
            }
        }

        if ($this->isFail()) {
            $this->redirectTo = $this->request->get('redirect_fail');

            if ($this->redirectTo === '#new' && $this->element) {
                return route($this->moduleName.".edit", $this->element->id);
            }
        }

        return $this->redirectTo;
    }

}