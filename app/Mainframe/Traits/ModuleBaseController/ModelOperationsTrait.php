<?php

namespace App\Mainframe\Traits\ModuleBaseController;

trait ModelOperationsTrait
{
    public function model()
    {
        $this->element->fill($this->transform());

        return $this->element;
    }

    public function attemptUpdate()
    {
        $this->modelValidator = $this->model()
            ->validator($this->messageBag);

        if ($this->modelValidator->updating()->passes()) {
            $this->element->save();
            $this->success('Successfully saved.', 400);
        } else {
            $this->fail('Validation failed', 400);
        }

        return $this;
    }


}