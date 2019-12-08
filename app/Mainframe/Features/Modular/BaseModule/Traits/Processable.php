<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

/** @mixin $this BaseModule */
trait Processable
{
    /**
     * @return mixed|\App\Mainframe\Features\Modular\Validator\ModelProcessor
     */
    public function processor()
    {
        /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $this */
        return $this->module()->processorInstance($this);
    }

}