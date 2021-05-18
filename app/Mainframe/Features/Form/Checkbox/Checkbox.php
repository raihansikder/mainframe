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
     * @param  array  $var
     * @param  null  $element
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->type = 'checkbox';
        $this->checkedVal = $this->var['checked_val'] ?? 1;
        $this->uncheckedVal = $this->var['unchecked_val'] ?? 0;

        // Force add form-control class
        $this->params['class'] = $this->var['class'] ?? '';

        $this->params['class'] .= ' '.$this->nameWithoutArrayLiteral().' ';

        // Add id in the class too
        if ($this->nameWithoutArrayLiteral() != $this->params['id']) {
            $this->params['class'] .= ' '.$this->params['id'];
        }

        // Add Id in class

        if (!$this->isEditable) {
            $this->params[] = 'disabled';
        }
    }

    public function value()
    {
        $value = parent::value();

        if (!$value) {
            return $this->uncheckedVal;
        }

        return $value;
    }

    public function paramsForCheckbox()
    {
        $params = $this->params;

        $params['class'] .= ' spyr-checkbox ';

        $params = array_merge($params, [
            'data-checkbox-name' => $this->name,
            'data-checkbox-id' => $this->id,
            'data-checked-val' => $this->checkedVal,
            'data-unchecked-val' => $this->uncheckedVal,
        ]);
        unset($params['v-model']);

        return $params;
    }

    public function paramsForHiddenInput()
    {
        $params = [];
        $params['class'] = $this->params['id'];
        if (isset($this->params['v-model'])) {
            $params['v-model'] = $this->params['v-model'];
        }

        return $params;

    }

}