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
    public function model()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController|self $this ->element */
        $this->element->fill($this->transform());

        return $this->element;
    }

    public function fill()
    {

    }

    /**
     * Validate and create
     *
     * @return mixed
     */
    public function attemptStore()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        $this->validator = $this->model()->validator();

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if ($this->validator->creating()->fails()) {
            return $this->fail('Validation failed', 200);
        }
        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        $this->element = $this->validator->element; // Get the updated element
        if (! $this->element->save()) {
            return $this->fail('Can not save for some reason', 200);
        }

        Upload::linkTemporaryUploads($this->element); // Should be moved to event

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
        $this->validator = $this->model()->validator();

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if ($this->validator->updating()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $this->validator->element; // Get the updated element.

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
        $this->validator = $this->model()->validator();

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if ($this->validator->deleting()->fails()) {
            return $this->fail('Validation failed', 200);
        }

        $this->element = $this->validator->element; // Get the updated element.

        /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
        if (! $this->element->delete()) {
            /** @var \App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController $this */
            return $this->fail('Can not delete for some reason', 200);
        }

        return $this->success('Successfully deleted.', 200);
    }

}