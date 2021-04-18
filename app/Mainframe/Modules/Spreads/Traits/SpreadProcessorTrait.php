<?php

namespace App\Mainframe\Modules\Spreads\Traits;

use App\Spread;

trait SpreadProcessorTrait
{
    // public $immutables;
    // public $transitions;
    // public $trackedFields;
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
        // $element->populate(); // Todo: Populate before validation
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
            // 'name' => 'required|between:1,255|'.
            //     'unique:spreads,name,'.($element->id ?? 'null').',id,deleted_at,NULL',
            // 'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /* Further customize error messages and attribute names by overriding */
    // public function customErrorMessages($merge = [])
    // public static function customAttributes($merge = [])

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

    // public function creating($element) { return $this; }
    // public function updating($element) { return $this; }
    // public function created($element) { return $this; }
    // public function updated($element) { return $this; }
    // public function saved($element) { return $this; }
    // public function deleting($element) { return $this; }
    // public function deleted($element) { re   turn $this; }

    /*
    |--------------------------------------------------------------------------
    | Functions for deriving immutables & allowed transitions
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Other helper functions
    |--------------------------------------------------------------------------
    */
    // Todo: Other helper functions

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    */

    // Todo: Functions for validation


}