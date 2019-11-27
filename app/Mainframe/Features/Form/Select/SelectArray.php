<?php

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Features\Form\Input;

class SelectArray extends Input
{
    public $options;

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);

        $this->options = $conf['options'] ?? [];
    }
}