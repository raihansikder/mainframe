<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use App\Mainframe\Features\Responder\Response;

trait SendResponse
{
    /** * @var \App\Mainframe\Features\Responder\Response */
    public $response;

    /**
     * @return mixed|Response
     */
    public function response()
    {
       return resolve(Response::class);
    }

}