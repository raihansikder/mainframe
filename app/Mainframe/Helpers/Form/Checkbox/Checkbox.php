<?php

namespace App\Mainframe\Helpers\Form\Checkbox;

use App\Mainframe\Helpers\Form\Input;

class Checkbox extends Input
{
    public $checkedVal;
    public $uncheckedVal;

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);

        $this->type = 'checkbox';
        $this->params['class'] = $conf['params']['class'] ?? '';
        $this->checkedVal = $conf['checked_val'] ?? 1;
        $this->uncheckedVal = $conf['unchecked_val'] ?? 0;
    }

}