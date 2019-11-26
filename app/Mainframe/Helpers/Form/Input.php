<?php

namespace App\Mainframe\Helpers\Form;

use Illuminate\Support\Str;

class Input extends Form
{
    public $containerClass;
    public $label;
    public $labelClass;
    public $type;
    public $name;
    public $value;
    public $oldInput;
    public $params;
    public $isEditable;

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Helpers\Modular\BaseModule\BaseModule  $element
     * @param  array  $conf
     */
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($element);

        $this->containerClass = $conf['container_class'] ?? 'col-md-3';
        $this->label = $conf['label'] ?? null;
        $this->labelClass = $conf['label_class'] ?? null;
        $this->type = $conf['type'] ?? null;
        $this->value = $conf['value'] ?? null;
        $this->oldInput = $this->old();
        $this->name = $conf['name'] ?? Str::random(8);
        $this->params = $conf['params'] ?? [];
        $this->isEditable = $conf['editable'] ?? true;

        // Force add form-control class
        $this->params['class'] = $this->params['class'] ?? '';
        $this->params['class'] .= ' form-control ';

        // Force add form-control class
        $this->params['id'] = $this->params['id'] ?? $this->name;
    }

    /**
     * Get old input
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function old()
    {
        if (request()->has($this->name)) {
            return request($this->name);
        }

        return request()->old($this->name);
    }

    /**
     * Value
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function value()
    {
        if ($this->value) {
            return $this->value;
        }
        if ($this->old()) {
            return $this->old();
        }
        if ($this->element && isset($this->element->{$this->name})) {
            return $this->element->{$this->name};
        }
    }

    /**
     * Print value
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function print()
    {
        return $this->value();
    }

}