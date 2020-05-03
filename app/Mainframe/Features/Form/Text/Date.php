<?php

namespace App\Mainframe\Features\Form\Text;

class Date extends InputText
{
    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  array  $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        // $this->params['class'] .= ' datepicker ';

    }
}