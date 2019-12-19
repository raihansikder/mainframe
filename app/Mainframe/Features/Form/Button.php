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
     * @param  array  $conf
     */
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($element);

        $this->label = $conf['label'] ?? null;
        $this->value = $conf['value'] ?? null;
        $this->name = $conf['name'] ?? Str::random(8);
        $this->params = $conf['params'] ?? [];
        $this->isEditable = $conf['editable'] ?? true;

        // Force add form-control class
        $this->params['class'] = $this->params['class'] ?? ' btn-default';
        $this->params['class'] .= ' btn ';

        // Force add form-control class
        $this->params['id'] = $this->params['id'] ?? $this->name;
    }

}