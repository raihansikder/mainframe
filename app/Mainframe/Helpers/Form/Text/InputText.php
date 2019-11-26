<?php

namespace App\Mainframe\Helpers\Form\Text;

use App\Mainframe\Helpers\Form\Input;

class InputText extends Input
{
    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     * @param  array  $conf
     */
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($element);

        $this->type = $conf['type'] ?? 'text'; // Can be text or password
    }
}