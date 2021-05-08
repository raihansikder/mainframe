<?php

namespace App\Mainframe\Features\Core\Traits;

use App\Mainframe\Features\Responder\Response;

/** @mixin  \App\Mainframe\Http\Controllers\BaseController $this */
trait SendResponse
{
    /** * @var \App\Mainframe\Features\Responder\Response */
    public $response;

    /** @var string */
    protected $redirectTo; // Note: This is set as 'protected' to avoid conflict with some laravel classes

    /**
     * @param  \App\Mainframe\Features\Responder\Response  $response
     * @return SendResponse
     */
    public function setResponse($response)
    {
        $this->response = $response;

        return $this;
    }

    /**
     * @return mixed|Response
     */
    public function response()
    {
        /** @var Response $response */
        $this->response = resolve(Response::class);

        return $this->prepareResponse();
    }

    public function prepareResponse()
    {
        return $this->setRedirectTo()->setValidator($this->validator ?? null);
    }

    /**
     * Set redirection url
     *
     * @param $message
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function setMessage($message)
    {
        return $this->response()->setMessage($message);
    }

    /**
     * Set redirection url
     *
     * @param  null  $to
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function setRedirectTo($to = null)
    {
        $to = $to ?: $this->resolveRedirectTo();

        $this->redirectTo = $to;

        return resolve(Response::class)->setRedirectTo($to);
    }

    /**
     * Try to figure out where to redirect
     *
     * @return array|\Illuminate\Http\Request|string
     */
    public function resolveRedirectTo()
    {
        if ($to = $this->redirectToBasedOnRequestParam()) {
            return $to;
        }

        if ($this->redirectTo) {
            return $this->redirectTo;
        }

        return request()->headers->get('referer') ?: \URL::full();
    }

    /**
     * @return array|\Illuminate\Http\Request|string|null
     */
    public function redirectToBasedOnRequestParam()
    {
        $successTo = request('redirect_success');
        $failTo = request('redirect_fail');

        if (isset($this->validator)) {
            $this->response->setValidator($this->validator);
        }

        if ($successTo && resolve(Response::class)->isSuccess()) {

            if (isset($this->element, $this->module) && $successTo == '#new') {
                return route($this->module->name.".edit", $this->element->id);
            }

            return $successTo;
        }

        if ($failTo && resolve(Response::class)->isFail()) {
            return $failTo;
        }

        return null;
    }

    /*
    |--------------------------------------------------------------------------
    | Proxy functions from response class
    |--------------------------------------------------------------------------
    |
    | Proxy functions
    |
    */

    /**
     * Render view
     *
     * @param $viewPath
     * @param  array  $viewVars
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($viewPath, $viewVars = [])
    {
        return $this->response()->view($viewPath, $viewVars);
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
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function failValidation($message = '')
    {
        return $this->response()->failValidation($message);
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

}