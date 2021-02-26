<?php

namespace App\Mainframe\Modules\Changes\Traits;

use App\Mainframe\Modules\Changes\Change;
use App\Mainframe\Modules\Changes\ChangeProcessor;

/** @mixin ChangeProcessor $this */
trait ChangeProcessorTrait
{

    /* Further customize immutables and allowed value transitions*/
    // public function getImmutables(){return $this->immutables; }
    // public function getTransitions(){return $this->transitions; }

    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */
    /**
     * Pre-fill model before running rule based validations for save(create/update)
     *
     * @param  Change  $element
     * @return $this
     */
    public function fill($element)
    {
        $element->populate();

        return $this;
    }

    /**
     * @param  Change  $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            // 'name' => 'required|between:1,255|unique:changes,name,'.($element->id ?? 'null').',id,deleted_at,NULL',
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
    | Autofill and functions to calculated field updates
    |--------------------------------------------------------------------------
    */
    /**
     * Fill data and set calculated data in fields for saving the module
     * This can depend of supporting fillFunct, setFunct,calculateFunct
     * return $this
     */
    public function populate()
    {
        // Example code
        // $this->fillAddress()->setAmounts();
        return $this;
    }

    /**
     * Set address
     * Example code
     *
     * @return $this
     */
    // public function setAddress()
    // {
    //     $this->field = 'val';
    //     return $this;
    // }

    /*
    |--------------------------------------------------------------------------
    | Non-static helper functions
    |--------------------------------------------------------------------------
    */
    // Todo: Write non-static helper functions here

    /*
    |--------------------------------------------------------------------------
    | Static helper functions
    |--------------------------------------------------------------------------
    */
    // Todo: static helper functions

    /*
    |--------------------------------------------------------------------------
    | Ability to create, edit, delete or restore
    |--------------------------------------------------------------------------
    |
    | An element can be editable or non-editable based on it's internal status
    | This is not related to any user, rather it is a model's individual sate
    | For example - A confirmed quotation should not be editable regardless
    | Of who is attempting to edit it.
    |
    */

    // public function isViewable() { return true; }
    // public function isCreatable() { return true; }
    // public function isEditable() { return true; }
    // public function isDeletable() { return true; }

    /*
    |--------------------------------------------------------------------------
    | Notifications
    |--------------------------------------------------------------------------
    |
    */
    // /**
    //  * Notify admins when quote is accepted
    //  */
    // public function sendSomeNotification()
    // {
    //     Notification::send($users, new NotificationClass($this));
    // }
}