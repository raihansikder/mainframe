<?php

namespace App\Mainframe\Features\Form\Select;

use Illuminate\Support\Arr;

class SelectModelMultiple extends SelectModel
{
    public $dataParent;

    /**
     * SelectModelMultiple constructor.
     *
     * @param  array  $var
     * @param  null  $element
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);
        $this->params['multiple'] = 'multiple';
        $this->dataParent = $this->name.'_data_parent';

    }

    /**
     * Generate options
     *
     * @return array
     */
    public function options()
    {
        $options = parent::options();

        return Arr::except($options, [0]); // Remove the null/0 option
    }

}