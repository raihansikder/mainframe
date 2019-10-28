<?php

namespace App\Mainframe\Modules\Users;

use Request;
use App\Mainframe\Helpers\Modular\Validator\ModelValidator;

class UserValidator extends ModelValidator
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
            'email' => 'required|email|unique:users,email'.(isset($element->id) ? ",$element->id" : ''),
            'first_name' => 'required|between:0,128',
            'last_name' => 'required|between:0,128',
            'partner_id' => 'required_if:group_id,2',
            'charity_id' => 'required_if:group_id,5',
            'address1' => 'between:0,512',
            'address2' => 'between:0,512',
            'city' => 'between:0,64',
            'county' => 'between:0,64',
            'zip_code' => 'between:0,20',
            'phone' => 'between:0,20',
            'mobile' => 'between:0,20',
            'country_id' => 'required',
        ];

        // While creation/registration of user password and password_confirm both should be available
        // Also if one password is given the other one should be given as well
        // While creation/registration of user password and password_confirm both should be available
        if (! isset($element->id)) {
            $rules = array_merge($rules, [
                'password' => 'required|min:6|confirmed',
            ]);
        } elseif (Request::get('password')) {
            $rules = array_merge($rules, [
                'password' => 'min:6|confirmed',
            ]);
        }

        return array_merge($rules, $merge);
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
     * @return $this
     */
    public function saving()
    {
        parent::saving();
        $this->userNameShouldNotbeJoker();

        return $this;
    }
    /**
     * Run validations for creating. This should always call the saving().
     *
     * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
     */
    // public function creating()
    // {
    //     return parent::creating(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for updating. This should always call the saving().
     *
     * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
     */
    // public function updating()
    // {
    //     return parent::updating(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for deleting.
     *
     * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
     */
    // public function deleting()
    // {
    //     return parent::deleting(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for restoring. This should always call the saving().
     *
     * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
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
     * Validate the name. Name should not be 'Joker'
     *
     * @return $this
     */
    private function userNameShouldNotBeJoker()
    {
        $user = $this->element;

        if ($user->name === 'Joker') {
            $this->invalidate('name', "Name can not be Joker");
        }

        return $this;
    }
}