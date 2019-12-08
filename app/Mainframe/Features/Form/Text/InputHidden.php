<?php

namespace App\Mainframe\Features\Form\Text;

use App\Mainframe\Features\Form\Input;

class InputHidden extends Input
{

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);
        $this->type = 'hidden';
        $this->containerClass = $conf['container_class'] ?? '';
    }
}