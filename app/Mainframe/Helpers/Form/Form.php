<?php

namespace App\Mainframe\Helpers\Form;

class Form
{
    public $element;

    public function __construct($element = null)
    {
        $this->element = $element;
    }
}