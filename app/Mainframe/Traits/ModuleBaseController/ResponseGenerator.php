<?php

namespace App\Mainframe\Traits\ModuleBaseController;

trait ResponseGenerator
{

    public function elementNotFound()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this */
        return $this->responder->fail('Not found', 404)->response();

    }

    public function permissionDenied()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this */
        return $this->responder->fail('Permission denied.', 403)->response();

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
}