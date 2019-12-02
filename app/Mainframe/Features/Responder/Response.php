<?php

namespace App\Mainframe\Features\Responder;

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

    /** @var \Illuminate\Validation\Validator */
    public $validator;

    /** @var string URL */
    public $redirectTo;

    /** @var \Illuminate\View\View|\Illuminate\Contracts\View\Factory */
    public $view;

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
        if ($this->redirectTo) {
            $response['redirect'] = $this->redirectTo;
        }

        return $response;
    }

    /**
     * Redirect to a route
     *
     * @param  string  $to
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($to = '#')
    {

        $redirect = $to ? Redirect::to($to) : Redirect::back();

        if ($this->isFail()) {
            $redirect = $redirect->withErrors($this->validator())->withInput();
        }

        return $redirect->with($this->defaultViewVars());
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