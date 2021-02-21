<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Mainframe\Modules\Users\Traits\UserProcessorTrait;
use App\Mainframe\Modules\Users\UserProcessor as MfUserProcessor;
use App\Projects\MyProject\Features\Modular\Validator\ModelProcessor;

class UserProcessor extends ModelProcessor
{
    use UserProcessorTrait, UserProcessorHelper;

    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var \App\Projects\MyProject\Modules\Users\User */
    public $element;

    public $immutables = ['email'];
    // public $transitions;
    // public $trackedFields;

    /* Further customize immutables and allowed value transitions*/
    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */
    // /**
    //  * Pre-fill model before running rule based validations
    //  *
    //  * @param  \App\Mainframe\Modules\Users\User  $element
    //  * @return $this
    //  */
    // public function fill($element)
    // {
    //     $element->populate();
    //     $this->fillApiTokenGeneratedAt();
    //
    //     return $this;
    // }

    // /**
    //  * Validation rules. For regular expression validation use array instead of pipe
    //  *
    //  * @param       $element
    //  * @param  array  $merge
    //  * @return array
    //  */
    // public static function rules($element, $merge = [])
    // {
    //     $rules = [
    //         'email' => 'required|email|'.Rule::unique('users', 'email')->ignore($element->id)->whereNull('deleted_at'),
    //         'first_name' => 'required|between:0,128',
    //         'last_name' => 'required|between:0,128',
    //         'group_ids' => 'required',
    //         'address1' => 'between:0,512',
    //         'address2' => 'between:0,512',
    //         'city' => 'between:0,64',
    //         'county' => 'between:0,64',
    //         'zip_code' => 'between:0,20',
    //         'phone' => 'between:0,20',
    //         'mobile' => 'between:0,20',
    //         'gender' => 'between:0,32',
    //         'dob' => 'nullable|date:Y-m-d|before:'.date("Y-m-d", strtotime("-18 years")),
    //     ];
    //
    //     return array_merge($rules, $merge);
    // }

    /*
   |--------------------------------------------------------------------------
   | Execute validation on module events
   |--------------------------------------------------------------------------
   |
   | Check validations on saving, creating, updating, deleting and restoring
   */

    /**
     * Run validations for saving. This should be common for both creating and updating.
     *
     * @param  \App\User  $element
     * @return $this
     */
    // public function saving($element)
    // {
    //     $this->userMustHaveOneGroup()
    //         ->userCanNotHaveMultipleGroup()
    //         ->restrictFieldsBasedOnUserGroups()
    //         ->userCanNotAssignIrrelevantGroup();
    //
    //     return $this;
    // }
    // public function creating($element) { return $this; }
    // public function updating($element) { return $this; }
    // public function created($element) { return $this; }
    // public function updated($element) { return $this; }
    // public function saved($element) { return $this; }
    // public function deleting($element) { return $this; }
    // public function deleted($element) { return $this; }


}