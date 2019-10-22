<?php

namespace App\Mainframe\Helpers;

use Redirect;
use Response;

class Responder
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
    public $redirectTo;

    public function success($message = 'Operation successful', $code = 200)
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
        return ! $this->$this->isSuccess();
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
            'status' => $this->status,
            'message' => $this->message
        ];
        if ($this->payload) {
            $response['data'] = $this->payload;
        }

        if (isset($this->validator, $this->validator->validationErrors)) {
            $response['validation_errors'] = $this->validator->validationErrors;
        }
        if ($this->redirectTo) {
            $response['redirect'] = $this->redirectTo;
        }

        return $response;
    }

    /**
     *
     */
    public function redirect()
    {
        $to = $this->getRedirectTo();
        $redirect = Redirect::to($to);
        $validator = $this->validator;

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

        return null;

    }

}