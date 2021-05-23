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
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @param  array $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->label = $this->var['label'] ?? null;
        $this->value = $this->var['value'] ?? null;
        $this->name = $this->var['name'] ?? Str::random(8);
        $this->params = $this->var['params'] ?? [];
        $this->isEditable = $this->var['editable'] ?? true;

        // Force add form-control class
        $this->params['class'] = $this->params['class'] ?? ' btn-default';
        $this->params['class'] .= ' btn ';

        // Force add form-control class
        $this->params['id'] = $this->params['id'] ?? $this->name;
    }

}