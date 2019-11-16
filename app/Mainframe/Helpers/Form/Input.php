<?php

namespace App\Mainframe\Helpers\Form;

use Illuminate\Support\Str;

class Input extends Form
{
    public $element;
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
    public function __construct($element = null, $conf = [])
    {
        parent::__construct();

        $this->element = $element ?: $this->element;
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
    }

    /**
     * Get old input for this field
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function old()
    {
        if ($this->value) {
            return $this->value;
        }
        if (request()->has($this->name)) {
            return request($this->name);
        }

        return request()->old($this->name);
    }

    /**
     * Show value for the readonly
     *
     * @return null|string
     */
    public function readOnlyValue()
    {
        if ($this->element) {
            return $this->element->name;
        }

        return null;
    }

}