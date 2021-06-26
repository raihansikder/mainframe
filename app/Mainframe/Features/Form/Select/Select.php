<?php

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Features\Form\Input;

class Select extends Input
{
    public $options;

    /**
     * Input constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @param  array  $var
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->options = $this->var['options'] ?? [];
        // $this->options[null] = '-'; // By default laravel Form::select adds and empty selection for null

        if (!$this->isEditable) {
            $this->params = array_merge(['disabled' => 'disabled'], $this->params);
        }

    }

    /**
     * Print value
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function print()
    {
        return $this->options[$this->value()] ?? '';
    }

    /**
     * Check if input has multiple select
     * @return bool
     */
    public function isMultiple()
    {
        if (isset($this->params['multiple']) && $this->params['multiple'] == 'multiple') {
            return true;
        }

        return false;
    }
}