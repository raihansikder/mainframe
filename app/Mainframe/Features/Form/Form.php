<?php

namespace App\Mainframe\Features\Form;

class Form
{
    public $element;

    public function __construct($element = null)
    {
        $this->element = $element;
    }
}