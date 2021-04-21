<?php

namespace App\Mainframe\Modules\Notifications\Traits;

use App\Notification;

trait NotificationProcessorTrait
{
    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */
    /**
     * Fill the model with values
     *
     * @param  \App\Notification  $notification
     * @return $this
     */
    // public function fill($notification) { return $this; }

    /**
     * Validation rules.
     *
     * @param  \App\Notification  $notification
     * @param  array  $merge
     * @return array
     */
    public static function rules($notification, $merge = [])
    {
        $rules = [
            // 'name' => 'required|between:1,255|unique:notifications,name,'.(isset($notification->id) ? (string) $notification->id : 'null').',id,deleted_at,NULL',
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

    // public function saving($notification) { return $this; }
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