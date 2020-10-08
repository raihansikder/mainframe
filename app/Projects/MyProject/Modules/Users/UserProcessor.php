<?php

namespace App\Projects\MyProject\Modules\Users;

use Carbon\Carbon;
use Illuminate\Validation\Rule;

class UserProcessor extends \App\Mainframe\Modules\Users\UserProcessor
{
    /**
     * Fields that can not be changed once created.
     *
     * @var array
     */
    public $immutables = ['email'];
    /*
    |--------------------------------------------------------------------------
    | Fill model .
    |--------------------------------------------------------------------------
    |
    | Sometimes you need to automatically fill some fields of a model based
    | on known logic. For example: if you can take first_name and last_name
    | of an user and auto fill full_name.
    */

    /**
     * Fill the model with values
     *
     * @param  \App\User  $user
     * @return $this
     */
    public function fill($user)
    {
        parent::fill($user);

        $user->is_test = $user->is_test ?? 0;
        $user->is_active = $user->is_active ?? 1;

        $this->resolveName($user);
        $this->fillCountryName($user);
        $this->fillApiTokenGeneratedAt($user);

        return $this;
    }

    /**
     * Resolve name based on given input.
     *
     * @param  \App\User  $user
     */
    public function resolveName($user)
    {
        $user->full_name = $user->name_initial." ".$user->first_name." ".$user->last_name;
        if (! strlen($user->name)) {
            $user->name = $user->full_name;
        }
    }

    /**
     * Fill country name
     *
     * @param  \App\User  $user
     */
    public function fillCountryName($user)
    {
        if ($user->country()->exists()) {
            $user->country_name = $user->country->name;
        }
    }

    /**
     * Fill api_token_generated_at
     *
     * @param  \App\User  $user
     */
    public function fillApiTokenGeneratedAt($user)
    {
        if ($user->api_token != $this->original('api_token')) {
            $user->api_token_generated_at = Carbon::now();
        }
    }

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

            'email'      => 'required|email|'.Rule::unique('users', 'email')->ignore($element->id)->whereNull('deleted_at'),
            'first_name' => 'required|between:0,128',
            'last_name'  => 'required|between:0,128',
            'group_ids'  => 'required',
            'address1'   => 'between:0,512',
            'address2'   => 'between:0,512',
            'city'       => 'between:0,64',
            'county'     => 'between:0,64',
            'zip_code'   => 'between:0,20',
            'phone'      => 'between:0,20',
            'mobile'     => 'between:0,20',
            'gender'     => 'between:0,32',
            'dob'        => 'nullable|date:Y-m-d|before:'.date("Y-m-d", strtotime("-18 years")),
        ];

        return array_merge($rules, $merge);
    }

    /**
     * @return array
     */
    public function getImmutables()
    {

        return $this->immutables;
    }

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
     * @param  \App\User  $user
     * @return $this
     */
    public function saving($user)
    {
        parent::saving($user);

        /*
        |--------------------------------------------------------------------------
        | Call validation functions one by one.
        |--------------------------------------------------------------------------
        |
        | A list of functions that will be called sequentially to validate the model
        */
        $this->userMustHaveOneGroup($user);

        $this->userCanNotHaveMultipleGroup($user);

        $this->restrictFieldsBasedOnUserGroups($user);

        $this->userCanNotAssignIrrelevantGroup($user);


        return $this;
    }

    /**
     * Run validations for creating. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    public function creating($user)
    {
        parent::creating($user);

        return $this;
    }

    /**
     * Run validations for updating. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    // public function updating()
    // {
    //     return parent::updating(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for deleting.
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    // public function deleting()
    // {
    //     return parent::deleting(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for restoring. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    // public function restoring()
    // {
    //     return parent::restoring(); // TODO: Change the autogenerated stub
    // }

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    |
    | All validation must be checked through some function. All validation
    | functions are listed below.
    */
    /**
     * @param $user
     * @return $this
     */
    private function userCanNotHaveMultipleGroup($user)
    {
        if (count($user->group_ids) > 1) {
            $this->fieldError('group_ids', "User can have one group selected");
        }

        return $this;
    }

    /**
     * @param $user
     * @return $this
     */
    private function userMustHaveOneGroup($user)
    {
        if ($user->group_ids === null || $user->group_ids[0] === null) {
            $this->fieldError('group_ids', "User must have one group selected");
        }

        return $this;
    }

    /**
     * @param  User  $user
     * @return $this
     */
    private function restrictFieldsBasedOnUserGroups($user)
    {
        // if (user()->inGroupIds(['19', '20', '22', '23']) && $user->email_verified_at != $user->getOriginal('email_verified_at')) {
        //     $this->fieldError('group_ids', "Partner, Client and Vendor admin or user can not edit email verification at field");
        // }

        return $this;
    }

    /**
     * @param  User  $user
     * @return $this
     */
    private function userCanNotAssignIrrelevantGroup($user)
    {

        //user is sales admin
        // if (user()->isSalesAdmin() && ! in_array($user->group_ids[0], ['19', '20', '21', '22', '23', '28', '29'])) {
        //     $this->fieldError('group_ids', "Sales admin can only create resellers, vendors, sales admin,sales user or client user");
        // }
        return $this;
    }



}