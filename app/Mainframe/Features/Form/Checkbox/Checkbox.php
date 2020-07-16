<?php

namespace App\Mainframe\Features\Form\Checkbox;

use App\Mainframe\Features\Form\Input;

class Checkbox extends Input
{
    public $checkedVal;
    public $uncheckedVal;

    /**
     * Checkbox constructor.
     *
     * @param array $var
     * @param null $element
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->type            = 'checkbox';
        $this->checkedVal      = $this->var['checked_val'] ?? 1;
        $this->uncheckedVal    = $this->var['unchecked_val'] ?? 0;

        // Force add form-control class
        $this->params['class'] = $this->var['class'] ?? '';

        $this->params['class'] .= ' '.$this->nameWithoutArrayLiteral().' ';

        // Add id in the class too
        if ($this->nameWithoutArrayLiteral() != $this->params['id']) {
            $this->params['class'] .= ' '.$this->params['id'];
        }

        // Add Id in class
        $this->params['class'] .= ' spyr-checkbox ';


        $this->params = array_merge($this->params,[
            'data-checkbox-name' => $this->name,
            'data-checkbox-id'   => $this->id,
            'data-checked-val'   => $this->checkedVal,
            'data-unchecked-val' => $this->uncheckedVal
        ]);

        if (! $this->isEditable) {
            $this->params[] = 'disabled';
        }
    }

    public function value()
    {
        $value = parent::value();

        if (! $value) {
            return $this->uncheckedVal;
        }

        return $value;
    }

}