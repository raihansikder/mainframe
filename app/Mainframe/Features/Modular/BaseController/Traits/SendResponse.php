<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

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

}