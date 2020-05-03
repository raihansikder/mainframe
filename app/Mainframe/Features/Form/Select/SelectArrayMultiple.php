<?php

namespace App\Mainframe\Features\Form\Select;

class SelectArrayMultiple extends SelectArray
{
    public $dataParent;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        $this->params['multiple'] = 'multiple';
        $this->dataParent = $this->name.'_data_parent';

        // $this->name .= '[]';
    }

}