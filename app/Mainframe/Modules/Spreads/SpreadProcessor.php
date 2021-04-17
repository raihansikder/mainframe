<?php

namespace App\Mainframe\Modules\Spreads;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;

class SpreadProcessor extends ModelProcessor
{
    // Note: Pull in necessary traits
    use SpreadProcessorHelper;

    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var Spread */
    public $element;
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
        return $this;
    }

    /**
     * @param  Spread  $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            // 'name' => 'required|between:1,255|'.
            //     'unique:spreads,name,'.($element->id ?? 'null').',id,deleted_at,NULL',
            'is_active' => 'in:1,0',
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
        // Code : Validation
        // Code : Data-fill

        return $this;
    }

    // public function creating($element) { return $this; }
    // public function updating($element) { return $this; }
    // public function created($element) { return $this; }
    // public function updated($element) { return $this; }
    // public function saved($element) { return $this; }
    // public function deleting($element) { return $this; }
    // public function deleted($element) { return $this; }

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