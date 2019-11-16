<?php

namespace App\Mainframe\Helpers\Form\Select;

class SelectArrayMultiple extends SelectArray
{
    public $dataParent;

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);
        $this->params['multiple'] = 'multiple';
        $this->dataParent = $this->name.'_data_parent';

        $this->name .= '[]';
    }

}