<?php

namespace App\Mainframe\Features\Form;

use Illuminate\Support\Str;

class Input extends Form
{
    public $var;
    public $containerClass;
    public $label;
    public $labelClass;
    public $type;
    public $name;
    public $value;
    public $oldInput;
    public $params;
    public $isEditable;
    public $isHidden;

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @param  array $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->containerClass = $this->var['container_class'] ?? 'col-md-3';
        $this->label = $this->var['label'] ?? null;
        $this->labelClass = $this->var['label_class'] ?? null;
        $this->type = $this->var['type'] ?? null;
        $this->value = $this->var['value'] ?? null;
        $this->oldInput = $this->old();
        $this->name = $this->var['name'] ?? Str::random(8);
        $this->params = $this->var['params'] ?? [];

        $this->isEditable = $this->var['editable'] ?? true; // $this->getEditable();
        $this->isHidden = $this->var['hidden'] ?? false;

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
        // Retain null input.
        if (array_key_exists($this->name, request()->old())) {
            return $this->old();
        }

        if ($this->old()) {
            return $this->old();
        }

        if ($this->element && isset($this->element->{$this->name})) {
            return $this->element->{$this->name};
        }

        return null;
    }

    /**
     * Determine if the field is editable
     *
     * @return bool|mixed
     */
    public function getEditable()
    {

        if (isset($this->var['editable'])) {
            return $this->var['editable'];
        }

        return true;

        // $element = $this->element;
        //
        // if ($element
        //     && $element->isUpdating()
        //     && user()->cannot('update', $element)) {
        //
        //     return false;
        // }
        //
        // if ($element
        //     && $element->isCreating()
        //     && user()->cannot('create', $element)) {
        //
        //     return false;
        // }
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

    public function containerClasses()
    {
        return 'form-group'.' '.$this->containerClass
            .' '.$this->errors->first($this->name, 'has-error')
            .' '.$this->uid;
    }

}