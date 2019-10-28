<?php

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;

trait Validable
{
    public function validator()
    {
        return $this->module()->validatorInstance($this);
    }
}