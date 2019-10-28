<?php

namespace App\Mainframe\Helpers\Modular\BaseController\Traits;

use App\Mainframe\Modules\Uploads\Upload;

trait ModelOperationsTrait
{
    /**
     * Prepare the model, First transform the input and then fill
     *
     * @return mixed|\App\Mainframe\Helpers\Modular\BaseModule\BaseModule
     */
    public function modelReady()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|self $this ->element */
        $this->element->fill($this->transform());

        return $this->element;
    }

    /**
     * Validate and create
     *
     * @return mixed
     */
    public function attemptStore()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        $this->modelValidator = $this->modelReady()
            ->validator();
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if ($this->modelValidator->creating()->fails()) {
            return $this->fail('Validation failed', 200);
        }
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        $this->element = $this->modelValidator->element; // Get the updated element
        if (! $this->element->save()) {
            return $this->fail('Can not save for some reason', 200);
        }

        Upload::linkTemporaryUploads($this->element);

        return $this->success('Successfully saved.', 200);
    }

    /**
     * Validate and update
     *
     * @return \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController
     */
    public function attemptUpdate()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        $this->modelValidator = $this->modelReady()->validator();

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if ($this->modelValidator->updating()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $this->modelValidator->element; // Get the updated element.

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if (! $this->element->save()) {
            /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
            return $this->fail('Can not save for some reason', 200);
        }

        return $this->success('Successfully saved.', 200);
    }

    /**
     * Validate and delete
     *
     * @return \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController
     * @throws \Exception
     */
    public function attemptDestroy()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        $this->modelValidator = $this->modelReady()->validator();

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if ($this->modelValidator->deleting()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $this->modelValidator->element; // Get the updated element.

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if (! $this->element->delete()) {
            /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
            return $this->fail('Can not delete for some reason', 200);
        }

        return $this->success('Successfully deleted.', 200);
    }

}