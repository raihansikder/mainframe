<?php

namespace App\Mainframe\Features\Responder;

use URL;
use Redirect;
use Validator;

class Response
{

    /** @var int Success/Error codes 200.400 etc */
    public $code = 200;

    /** @var string success|fail */
    public $status;

    /** @var string Single line of message */
    public $message;

    /** @var mixed API payload, usually it is a list of a model */
    public $payload;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    public $element;

    /** @var string */
    public $redirectTo;

    /** @var \App\Mainframe\Features\Modular\Validator\ModelValidator */
    public $modelValidator;

    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /** @var \Illuminate\View\View|\Illuminate\Contracts\View\Factory */
    public $view;

    /**
     * Response constructor.
     */
    public function __construct()
    {
        //$this->validator = Validator::make([], []);
    }

    /**
     * Pick which validator to use
     *
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validator()
    {
        if ($this->validator) {
            return $this->validator;
        }

        if ($this->modelValidator) { // First load modelValidator
            $this->validator = $this->modelValidator->validator();

            return $this->validator;
        }

        $this->validator = Validator::make([], []); // Empty validator

        return $this->validator;
    }

    /**
     * Checks if the response expects JSON
     *
     * @return bool
     */
    public function expectsJson()
    {
        if (request()->expectsJson()) {
            return true;
        }

        return request('ret') === 'json';
    }

    /**
     * Abort on fail.
     *
     * @param  null  $message
     * @param  null  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function failed($message = null, $code = null)
    {
        $message = $message ?: 'Operation failed';
        $code = $code ?: 400;

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
    public function permissionDenied($message = null, $code = null)
    {
        $message = $message ?: 'Permission denied';
        $code = $code ?: 403;

        return $this->failed($message, $code);
    }

    /**
     * Abort on resource not found
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function notFound($message = null, $code = null)
    {
        $message = $message ?: 'Item not found';
        $code = $code ?: 404;

        return $this->failed($message, $code);
    }

    /**
     * Set response as success
     *
     * @param  string  $message
     * @param  int  $code
     * @return $this
     */
    public function success($message = null, $code = null)
    {
        $message = $message ?: '';
        $code = $code ?: 200;

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
    public function fail($message = null, $code = null)
    {

        $message = $message ?: '';
        $code = $code ?: 404;

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
    public function load($payload = null)
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
        return \Response::json($this->prepareJson(), $this->code);
    }

    /**
     * Prepare the array for JSON response.
     *
     * @return array
     */
    public function prepareJson()
    {
        // Generic response
        $response = [
            'code' => $this->code,
            'status' => $this->status,
            'message' => $this->message
        ];
        // Add payload
        if ($this->payload) {
            $response['data'] = $this->payload;
        }

        /*--------------------------------
         * Select which validator to load
         *-------------------------------- .
         */
        if ($this->validator()->messages()) {
            $response['validation_errors'] = json_decode($this->validator()->messages(), true);
        }
        /*-------------------------------*/

        // Add redirect to
        if ($this->redirectTo()) {
            $response['redirect'] = $this->redirectTo();
        }

        return $response;
    }

    /**
     * Redirect to a route
     *
     * @param  null  $to
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($to = null)
    {
        $to = $to ?: $this->redirectTo();

        $redirect = $to ? Redirect::to($to) : Redirect::back();

        if ($this->isFail()) {
            $redirect->withInput()->withErrors($this->validator());
        }

        return $redirect->with($this->defaultViewVars());
    }

    /**
     * Try to figure out where to redirect
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function redirectTo()
    {
        if ($this->redirectTo) {
            return $this->redirectTo;
        }

        if ($this->isSuccess() && request('redirect_success')) {
            if ($this->element && request('redirect_success') == '#new') {
                return route($this->element->module()->name.".edit", $this->element->id);
            }

            return request('redirect_success');
        }

        if ($this->isFail() && request('redirect_fail')) {
            return request('redirect_fail');
        }

        return URL::full();
    }

    /**
     * Render a view files
     *
     * @param  string  $path
     * @param  array  $with
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($path, $with = [])
    {
        $with = array_merge($with, $this->defaultViewVars());

        return view($path)->withErrors($this->validator())->with($with);
    }

    /**
     * Additional values to be passed to view through view composer or redirect.
     * In redirect the value has to be accessed via session.
     *
     * @param  array  $vars
     * @return array
     */
    public function defaultViewVars($vars = [])
    {
        return array_merge([
            'responseStatus' => $this->status,
            'responseMessage' => $this->message,
        ], $vars);
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