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

    // /**
    //  * Generate options
    //  *
    //  * @return array
    //  */
    // public function options()
    // {
    //     $options = parent::options();
    //
    //     // Remove the first(empty) option. Not meaningful for multi-select
    //     $collection = collect($options);
    //     $firstKey = $collection->keys()->first();
    //     $collection->forget($firstKey);
    //
    //     return $collection->toArray();
    // }

    /**
     * Value for multi-select
     *
     * @return array|\Illuminate\Http\Request|string|null
     */
    public function value()
    {
        $value = parent::value();

        return $value ?? [];
    }

}