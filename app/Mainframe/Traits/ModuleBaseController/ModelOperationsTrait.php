<?php

namespace App\Mainframe\Traits\ModuleBaseController;

trait ModelOperationsTrait
{
    /**
     * @return mixed|\App\Mainframe\BaseModule
     */
    public function model()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController|self $this->element */
        $this->element->fill($this->transform());

        return $this->element;
    }

    public function attemptUpdate()
    {
        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $this->modelValidator = $this->model()
            ->validator($this->messageBag);

        if ($this->modelValidator->updating()->passes()) {
            $this->element->save();
            $this->success('Successfully saved.', 200);
        } else {
            $this->fail('Validation failed', 200);
        }

        return $this;
    }


}