<?php

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Features\Form\Input;

class SelectArray extends Input
{
    public $options;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->options = $this->var['options'] ?? [];
    }
}