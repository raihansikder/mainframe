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
    public function guessRedirectTo()
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

    /*
    |--------------------------------------------------------------------------
    | Proxy functions from response class
    |--------------------------------------------------------------------------
    |
    | Proxy functions
    |
    */

    public function view($path, $vars = [])
    {
        return $this->response()->view($path, $vars = []);
    }

    /**
     * Redirect
     *
     * @param  string  $to
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($to = null)
    {
        return $this->response()->redirect($to);
    }

    /**
     * Json
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function json()
    {
        return $this->response()->json();
    }

    /**
     * Json or abort
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function failed($message = 'Failed', $code = Response::HTTP_BAD_REQUEST)
    {
        return $this->response()->failed($message, $code);
    }

    /**
     * Json or succeeded
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function succeeded($message = null, $code = Response::HTTP_OK)
    {
        return $this->response()->succeeded($message, $code);
    }

    /**
     * Determine what needs to be dispatched.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function send()
    {
        return $this->response()->send();
    }

    /**
     * Abort on permission denial
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function permissionDenied($message = 'Permission denied', $code = Response::HTTP_FORBIDDEN)
    {
        return $this->response()->permissionDenied($message, $code);
    }

    /**
     * Abort on resource not found
     *
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function notFound($message = 'Not found', $code = Response::HTTP_NOT_FOUND)
    {
        return $this->response()->notFound($message, $code);
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

    /**
     * Set response as fail
     *
     * @param  string  $message
     * @param  int  $code
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function failValidation($message = 'Validation failed', $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return $this->response()->failValidation($message, $code);
    }

    /**
     * Load a payload to be sent with the response
     *
     * @param  null  $payload
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function load($payload = null)
    {
        return $this->response()->load($payload);
    }

    /**
     * @param  null  $redirectTo
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function to($redirectTo = null)
    {
        return $this->response()->to($redirectTo);
    }

    /**
     * Check if response is success
     *
     * @return bool
     */
    public function isSuccess()
    {

        return $this->response()->isSuccess();
    }

    /**
     * Check if response is fail
     *
     * @return bool
     */
    public function isFail()
    {
        return $this->response()->isFail();
    }

    /**
     * Checks if the response expects JSON
     *
     * @return bool
     */
    public function expectsJson()
    {
        return $this->response()->expectsJson();
    }

    /**
     * Additional values to be passed to view through view composer or redirect.
     * In redirect the value has to be accessed via session.
     *
     * @return array
     */
    public function defaultViewVars()
    {
        return $this->response()->defaultViewVars();
    }

}