<?php

namespace App\Mainframe\Features\Form\Select;

class SelectArrayMultiple extends SelectArray
{
    public $dataParent;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        $this->params['multiple'] = 'multiple';
        $this->dataParent         = $this->name.'_data_parent';
    }

    /**
     * Print value
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function print()
    {

        if (! is_array($this->value())) {
            return '';
        }

        $str = '';
        foreach ($this->value() as $val) {
            if(isset($this->options[$val])){
                $str .= $this->options[$val].', ';
            }
        }

        return trim($str, ', ');
    }

}