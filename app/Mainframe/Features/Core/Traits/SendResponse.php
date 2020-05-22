<?php /** @noinspection ALL */

namespace App\Mainframe\Features\Core\Traits;

use App\Mainframe\Features\Responder\Response;
use URL;

/** @mixin  \App\Mainframe\Http\Controllers\BaseController $this */
trait SendResponse
{
    /** * @var \App\Mainframe\Features\Responder\Response */
    public $response;

    /** @var string */
    protected $redirectTo;

    /**
     * @param  \Illuminate\Validation\Validator|null $validator
     * @return mixed|Response
     */
    public function response($validator = null)
    {
        /** @var Response $response */
        $this->response = resolve(Response::class);

        return $this->response;
    }

    /**
     * Set redirection url
     *
     * @param null $to
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function setMessage($message)
    {
        return $this->prepareResponse()->setMessage($message);
    }


    /**
     * Set redirection url
     *
     * @param null $to
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function setRedirectTo($to = null)
    {
        $to = $to ?: $this->resolveRedirectTo();

        $this->redirectTo = $to;

        return $this->response()->setRedirectTo($to);

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

        return request()->headers->get('referer') ?: URL::full();
    }

    /**
     *
     * @return array|\Illuminate\Http\Request|string|null
     */
    public function redirectToBasedOnRequestParam()
    {
        $successTo = request('redirect_success');
        $failTo = request('redirect_fail');

        if ($successTo && $this->response()->isSuccess()) {

            if (isset($this->element, $this->module) && $successTo == '#new') {
                return route($this->module->name.".edit", $this->element->id);
            }

            return $successTo;
        }

        if ($failTo && $this->response()->isFail()) {
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

    public function prepareResponse()
    {
        return $this->setRedirectTo()->setValidator($this->validator);
    }

    /**
     * Render view
     *
     * @param $path
     * @param array $vars
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($path, $vars = [])
    {
        return $this->prepareResponse()->view($path, $vars = []);
    }

    /**
     * Redirect
     *
     * @param  string $to
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirect($to = null)
    {
        return $this->prepareResponse()->redirect($to);
    }

    /**
     * Json
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function json()
    {
        return $this->prepareResponse()->json();
    }

    /**
     * Json or abort
     *
     * @param  string $message
     * @param  int $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function failed($message = 'Failed', $code = Response::HTTP_BAD_REQUEST)
    {
        return $this->prepareResponse()->failed($message, $code);
    }

    /**
     * Json or succeeded
     *
     * @param  string $message
     * @param  int $code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function succeeded($message = null, $code = Response::HTTP_OK)
    {
        return $this->prepareResponse()->succeeded($message, $code);
    }

    /**
     * Determine what needs to be dispatched.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\View\View|void
     */
    public function send()
    {
        return $this->prepareResponse()->send();
    }

    /**
     * Abort on permission denial
     *
     * @param  string $message
     * @param  int $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function permissionDenied($message = 'Permission denied', $code = Response::HTTP_FORBIDDEN)
    {
        return $this->prepareResponse()->permissionDenied($message, $code);
    }

    /**
     * Abort on resource not found
     *
     * @param  string $message
     * @param  int $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function notFound($message = 'Not found', $code = Response::HTTP_NOT_FOUND)
    {
        return $this->prepareResponse()->notFound($message, $code);
    }

    /**
     * Build a success response.
     *
     * @param  null $message
     * @param  int $code
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function success($message = null, $code = Response::HTTP_OK)
    {
        return $this->prepareResponse()->success($message, $code);
    }

    /**
     * Build a fail response.
     *
     * @param  null $message
     * @param  int $code
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function fail($message = null, $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return $this->prepareResponse()->fail($message, $code);
    }

    /**
     * Set response as fail
     *
     * @param  string $message
     * @param  int $code
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function failValidation($message = 'Validation failed', $code = Response::HTTP_UNPROCESSABLE_ENTITY)
    {
        return $this->prepareResponse()->failValidation($message, $code);
    }

    /**
     * Load a payload to be sent with the response
     *
     * @param  null $payload
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function load($payload = null)
    {
        return $this->prepareResponse()->load($payload);
    }

    /**
     * @param  null $redirectTo
     * @return \App\Mainframe\Features\Responder\Response|mixed
     */
    public function to($redirectTo = null)
    {
        return $this->prepareResponse()->to($redirectTo);
    }

    /**
     * Check if response is success
     *
     * @return bool
     */
    public function isSuccess()
    {

        return $this->prepareResponse()->isSuccess();
    }

    /**
     * Check if response is fail
     *
     * @return bool
     */
    public function isFail()
    {
        return $this->prepareResponse()->isFail();
    }

    /**
     * Checks if the response expects JSON
     *
     * @return bool
     */
    public function expectsJson()
    {
        return $this->prepareResponse()->expectsJson();
    }

}