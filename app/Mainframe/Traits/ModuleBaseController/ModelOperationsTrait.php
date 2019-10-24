<?php

namespace App\Mainframe\Traits\ModuleBaseController;

use App\Upload;

trait ModelOperationsTrait
{
    /**
     * @return mixed|\App\Mainframe\BaseModule
     */
    public function model()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this ->element */
        $this->element->fill($this->transform());

        return $this->element;
    }

    public function attemptCreate()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $this->modelValidator = $this->model()
            ->validator();
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        if ($this->modelValidator->creating()->fails()) {
            return $this->fail('Validation failed', 200);
        }
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $this->element = $this->modelValidator->element; // Get the updated element
        if (! $this->element->save()) {
            return $this->fail('Can not save for some reason', 200);
        }

        Upload::linkTemporaryUploads($this->element);

        return $this->success('Successfully saved.', 200);
    }

    public function attemptUpdate()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $this->modelValidator = $this->model()->validator();

        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        if ($this->modelValidator->updating()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $this->modelValidator->element; // Get the updated element.

        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        if (! $this->element->save()) {
            /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
            return $this->fail('Can not save for some reason', 200);
        }

        return $this->success('Successfully saved.', 200);
    }

}