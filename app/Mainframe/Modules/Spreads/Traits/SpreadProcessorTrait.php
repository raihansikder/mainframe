<?php

namespace App\Mainframe\Modules\Spreads\Traits;

use App\Spread;

trait SpreadProcessorTrait
{

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */
    /**
     * Pre-fill model before running rule based validations
     *
     * @param  Spread  $element
     * @return $this
     */
    public function fill($element)
    {
        $element->is_active = 1; // Always set as active

        return $this;
    }

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param  Spread  $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            // 'type' => 'in:'.implode(',', Spread::$types),
        ];

        return array_merge($rules, $merge);
    }

    /*
    |--------------------------------------------------------------------------
    | Execute calculations, validations and actions on different events
    |--------------------------------------------------------------------------
    */
    /**
     * @param  Spread  $element
     * @return $this
     */
    public function saving($element)
    {
        $element->fillModuleAndElement('spreadable');

        return $this;
    }


}