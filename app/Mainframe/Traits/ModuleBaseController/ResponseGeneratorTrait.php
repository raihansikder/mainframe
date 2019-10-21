<?php

namespace App\Mainframe\Traits\ModuleBaseController;

trait ResponseGeneratorTrait
{

    /**
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function elementNotFound($message = 'Not found', $code = 404)
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this */
        return $this->responder->fail($message, $code)->response();

    }

    /**
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function permissionDenied($message = 'Permission denied.', $code = 404)
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this */
        return $this->responder->fail($message, $code)->response();

    }

    public function elementFound()
    {
        $this->request->attributes->add([
            'redirect_success' => route($this->moduleName.'.edit', $this->element->id)
        ]);
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this */
        $this->responder->payload = $this->element;

        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this */
        return $this->responder->success('Item found')->response();

    }

    /**
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function validationFailed($message = 'Validation failed', $code = 400)
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this */
        return $this->responder->fail($message, $code)->response();

    }


}