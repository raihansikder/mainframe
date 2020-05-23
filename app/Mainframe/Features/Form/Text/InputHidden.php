<?php

namespace App\Mainframe\Features\Form\Text;

use App\Mainframe\Features\Form\Input;

class InputHidden extends Input
{

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        $this->type = 'hidden';
        $this->containerClass = $this->var['container_class'] ?? $this->var['div'] ?? '';
    }
}