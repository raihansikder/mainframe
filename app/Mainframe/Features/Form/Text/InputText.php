<?php

namespace App\Mainframe\Features\Form\Text;

use App\Mainframe\Features\Form\Input;

class InputText extends Input
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

        $this->type = $var['type'] ?? 'text'; // Can be text or password

        if (! $this->isEditable) {
            $this->params['readonly'] = 'readonly';
        }
    }
}