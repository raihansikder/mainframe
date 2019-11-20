<?php

namespace App\Mainframe\Helpers\Form\Select;

use Illuminate\Support\Arr;

class SelectModelMultiple extends SelectModel
{
    public $dataParent;

    /**
     * SelectModelMultiple constructor.
     *
     * @param  array  $conf
     * @param  null  $element
     */
    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);
        $this->params['multiple'] = 'multiple';
        $this->dataParent = $this->name.'_data_parent';

        $this->name .= '[]';
    }

    /**
     * Generate options
     * @return array
     */
    public function options()
    {
        $options = parent::options();

        return Arr::except($options, [0]); // Remove the null/0 option
    }

}