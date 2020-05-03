<?php

namespace App\Mainframe\Features\Form\Checkbox;

use App\Mainframe\Features\Form\Input;

class Checkbox extends Input
{
    public $checkedVal;
    public $uncheckedVal;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->type = 'checkbox';
        $this->params['class'] = $var['params']['class'] ?? '';
        $this->checkedVal = $var['checked_val'] ?? 1;
        $this->uncheckedVal = $var['unchecked_val'] ?? 0;
    }

    public function value()
    {
        $value = parent::value();

        if (!$value) {
            return $this->uncheckedVal;
        }

        return $value;
    }

}