<?php

namespace App\Mainframe\Features\Core\Traits;

use URL;
use App\Mainframe\Features\Responder\Response;

trait SendResponse
{
    /** * @var \App\Mainframe\Features\Responder\Response */
    public $response;

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
    public function redirectTo()
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

        return URL::full();
    }

}