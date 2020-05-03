<?php

namespace App\Mainframe\Features\Form;

use Illuminate\Support\Str;

class Button extends Form
{
    public $label;
    public $type = 'button';
    public $name;
    public $value;
    public $params;
    public $isEditable;

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  array  $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($element);

        $this->label = $var['label'] ?? null;
        $this->value = $var['value'] ?? null;
        $this->name = $var['name'] ?? Str::random(8);
        $this->params = $var['params'] ?? [];
        $this->isEditable = $var['editable'] ?? true;

        // Force add form-control class
        $this->params['class'] = $this->params['class'] ?? ' btn-default';
        $this->params['class'] .= ' btn ';

        // Force add form-control class
        $this->params['id'] = $this->params['id'] ?? $this->name;
    }

}