<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this  */
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