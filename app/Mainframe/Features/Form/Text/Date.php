<?php

namespace App\Mainframe\Features\Form\Text;

class Date extends InputText
{
    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  array  $conf
     */
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);
        // $this->params['class'] .= ' datepicker ';

    }
}