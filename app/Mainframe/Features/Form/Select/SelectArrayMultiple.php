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
            if (isset($this->options[$val])) {
                $str .= $this->options[$val].', ';
            }
        }

        return trim($str, ', ');
    }

    /**
     * Generate options
     *
     * @return array
     */
    public function options()
    {
        $options = $this->options;

        // Remove the first(empty) option. Not meaningful for multi-select
        $collection = collect($options);
        // $firstKey = $collection->keys()->first();
        // if ($firstKey == '') {
        //     $collection->forget($firstKey);
        // }

        return $collection->toArray();
    }

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