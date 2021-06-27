<?php

namespace App\Mainframe\Modules\Reports\Traits;

use App\Mainframe\Modules\Reports\ReportProcessor;
use App\Report;

/** @mixin ReportProcessor $this */
trait ReportProcessorTrait
{

    /*
    |--------------------------------------------------------------------------
    | Rules.
    |--------------------------------------------------------------------------
    |
    | Write the laravel validation rules
    */
    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? (string) $element->id : 'null').',id,deleted_at,NULL',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /*
     |--------------------------------------------------------------------------
     | Execute calculations, validations and actions on different events
     |--------------------------------------------------------------------------
     */

    /**
     * @param  Report  $element
     * @return $this
     */
    public function saving($element)
    {
        // Todo: First validate
        // --------------------
        // $this->checkSomething();

        // Todo: Then do further processing
        // ----------------------------------
        if ($this->isValid()) {
            $element->title = $element->name;
        }

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