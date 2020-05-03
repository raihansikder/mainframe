<?php

namespace App\Mainframe\Features\Form;

use Illuminate\Support\Str;

class Input extends Form
{
    public $conf;
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
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @param  array $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($element);

        $this->conf = $var;

        $this->containerClass = $var['container_class'] ?? 'col-md-3';
        $this->label = $var['label'] ?? null;
        $this->labelClass = $var['label_class'] ?? null;
        $this->type = $var['type'] ?? null;
        $this->value = $var['value'] ?? null;
        $this->oldInput = $this->old();
        $this->name = $var['name'] ?? Str::random(8);
        $this->params = $var['params'] ?? [];

        $this->isEditable = $this->getEditable();

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

        if (isset($this->conf['editable'])) {
            return $this->conf['editable'];
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

}