<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\Validator\ModelValidator;

class UploadValidator extends ModelValidator
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
            'is_active' => 'in:1,0',
        ];

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

    /**
     * Run validations for creating. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
     */
    // public function creating()
    // {
    //     return parent::creating(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for updating. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
     */
    // public function updating()
    // {
    //     return parent::updating(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for deleting.
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
     */
    // public function deleting()
    // {
    //     return parent::deleting(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for restoring. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
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
    private function uploadNameShouldNotBeJoker()
    {
        $upload = $this->element;

        if ($upload->name === 'Joker') {
            $this->invalidate('name', "Name can not be Joker");
        }

        return $this;
    }
}