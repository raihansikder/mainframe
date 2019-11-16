<?php

namespace App\Mainframe\Helpers\Form\Text;

use App\Mainframe\Helpers\Form\Input;

class TextArea extends Input
{
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);

        $this->containerClass = $conf['container_class'] ?? 'col-md-6';
    }
}