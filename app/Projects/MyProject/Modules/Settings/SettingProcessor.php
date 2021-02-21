<?php

namespace App\Projects\MyProject\Modules\Settings;

use App\Mainframe\Modules\Settings\Traits\SettingProcessorTrait;
use App\Projects\MyProject\Features\Modular\Validator\ModelProcessor;

class SettingProcessor extends ModelProcessor
{
    // Example : Resolve trait method conflict
    //      https://stackoverflow.com/questions/41679384/php-traits-how-to-resolve-a-property-name-conflict
    //      https://stackoverflow.com/questions/11939166/how-to-override-trait-function-and-call-it-from-the-overridden-function
    use SettingProcessorTrait {
        // fill as customFill; // Give a unique function name
    }
    use SettingProcessorHelper {
        // User traits fill() instead of helper's
        SettingProcessorTrait::fill insteadof SettingProcessorHelper;
    }

    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var Setting */
    public $element;
    // public $immutables = ['title'];
    // public $transitions;
    // public $trackedFields = ['title'];

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */
    /**
     * Pre-fill model before running rule based validations
     *
     * @param  Setting  $element
     * @return $this
     */
    public function fill($element)
    {
        $element->populate();

        return $this;
    }

    /**
     * @param  Setting  $element
     * @param  array  $merge
     * @return array
     */
    // public static function rules($element, $merge = [])
    // {
    //     $rules = [
    //         'name' => 'required|between:1,255|'.
    //             'unique:settings,name,'.($element->id ?? 'null').',id,deleted_at,NULL',
    //         'is_active' => 'in:1,0',
    //     ];
    //
    //     return array_merge($rules, $merge);
    // }

    /* Further customize error messages and attribute names by overriding */
    // public function customErrorMessages($merge = [])
    // public static function customAttributes($merge = [])

    /*
    |--------------------------------------------------------------------------
    | Execute calculations, validations and actions on different events
    |--------------------------------------------------------------------------
    */

    /**
     * @param  Setting  $element
     * @return $this
     */
    // public function saving($element) { return $this; }
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
    /* Further customize immutables and allowed value transitions*/
    // public function getImmutables(){return $this->immutables; }
    // public function getTransitions(){return $this->transitions; }

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