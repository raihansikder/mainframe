<?php

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Features\Form\Input;

class Select extends Input
{
    public $options;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->options = $this->var['options'] ?? [];

        if (! $this->isEditable) {
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
}