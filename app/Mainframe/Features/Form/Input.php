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
    public $id;
    public $value;
    public $oldInput;
    public $params;
    public $isEditable;
    public $isHidden;
    public $tooltip;

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  array  $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->containerClass = $this->var['container_class'] ?? $this->var['div'] ?? 'col-md-3';
        $this->label = $this->var['label'] ?? null;
        $this->labelClass = $this->var['label_class'] ?? null;
        $this->type = $this->var['type'] ?? null;
        $this->value = $this->var['value'] ?? null;
        $this->oldInput = $this->old();
        $this->name = $this->var['name'] ?? Str::random(8);
        $this->params = $this->var['params'] ?? [];
        $this->isEditable = $this->var['editable'] ?? true; // $this->getEditable();
        $this->isHidden = $this->var['hidden'] ?? false;
        $this->tooltip = $this->var['tooltip'] ?? null;

        // Force add form-control class
        $this->params['id'] = $this->var['id']
            ?? $this->params['id']
            ?? $this->nameToId();
        $this->id = $this->params['id'];

        // Force add form-control class
        $this->params['class'] = $this->var['class'] ?? $this->params['class'] ?? '';

        $this->params['class'] .= ' form-control '
            .$this->nameWithoutArrayLiteral().' ';

        // Add id in the class too
        if ($this->nameWithoutArrayLiteral() != $this->params['id']) {
            $this->params['class'] .= $this->params['id'];
        }

        // Place-holder
        $this->params['placeholder'] = $this->var['placeholder'] ?? $this->params['placeholder'] ?? '';
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

        // Retain 0 input
        if ($this->old() != null) {
            return $this->old();
        }

        if ($this->element && isset($this->element->{$this->name})) {
            return $this->element->{$this->name};
        }

        return null;
    }

    /**
     * logically determine if the field is editable
     * todo: unused
     *
     * @return bool|mixed
     */
    public function determineEditability()
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

    /**
     * Class of the main div
     *
     * @return string
     */
    public function containerClasses()
    {
        return 'form-group'.' '.$this->containerClass
            .' '.$this->errors->first($this->name, 'has-error')
            .' '.$this->uid;
    }

    /**
     * Convert name to id
     *
     * @return string
     */
    public function nameToId()
    {
        // change name[i][j] to ID name_i_j
        $id = $this->name;
        $id = str_replace(['[', ']', '__'], '_', $id);

        $id = trim($id, '_');

        // for name[] change the ID to name_XXXXXX
        if ($id.'[]' == $this->name) {
            $id .= '_'.$this->uid;
        }

        return $id;
    }

    public function nameWithoutArrayLiteral()
    {
        return explode('[', $this->name)[0];
    }

}