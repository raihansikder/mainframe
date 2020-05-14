<?php

namespace App\Mainframe\Features\Form\Text;

class Datetime extends Date
{

    public $format = 'd-m-Y H:i:s';

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @param  array $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

    }

}