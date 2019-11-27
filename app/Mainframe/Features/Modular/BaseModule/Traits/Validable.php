<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

/** @mixin $this BaseModule */
trait Validable
{
    /**
     * @return mixed|\App\Mainframe\Features\Modular\Validator\ModelValidator
     */
    public function validator()
    {
        /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $this */
        return $this->module()->validatorInstance($this);
    }

}