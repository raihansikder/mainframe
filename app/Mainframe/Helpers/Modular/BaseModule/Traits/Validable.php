<?php

namespace App\Mainframe\Helpers\Modular\BaseModule\Traits;

/** @mixin $this BaseModule */
trait Validable
{
    /**
     * @return mixed|\App\Mainframe\Helpers\Modular\Validator\ModelValidator
     */
    public function validator()
    {
        /** @var \App\Mainframe\Helpers\Modular\BaseModule\BaseModule $this */
        return $this->module()->validatorInstance($this);
    }

}