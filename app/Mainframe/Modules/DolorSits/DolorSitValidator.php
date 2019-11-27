<?php

namespace App\Mainframe\Modules\DolorSits;

use App\Mainframe\Features\Modular\Validator\ModelValidator;

class DolorSitValidator extends ModelValidator
{
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
     * @param  \App\Mainframe\Modules\DolorSits\DolorSit  $dolorSit
     * @return $this
     */
    public function fill($dolorSit)
    {
        parent::fill($dolorSit);

        // $dolorSit->name = 'Lorem Ipsum';

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Rules.
    |--------------------------------------------------------------------------
    |
    | Write the laravel validation rules
    */

    /**
     * Validation rules.
     *
     * @param  \App\Mainframe\Modules\DolorSits\DolorSit  $dolorSit
     * @param  array  $merge
     * @return array
     */
    public static function rules($dolorSit, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:dolor_sits,name,'.(isset($dolorSit->id) ? (string) $dolorSit->id : 'null').',id,deleted_at,NULL',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /**
     * Custom error messages.
     *
     * @param  array  $merge
     * @return array
     */
    public static function customErrorMessages($merge = [])
    {
        $messages = [];

        return array_merge($messages, $merge);
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
     * @param $dolorSit \App\Mainframe\Modules\Superheroes\DolorSit
     * @return $this
     */
    public function saving($dolorSit)
    {
        parent::saving($dolorSit);
        /*
        |--------------------------------------------------------------------------
        | Call validation functions one by one.
        |--------------------------------------------------------------------------
        |
        | A list of functions that will be called sequentially to validate the model
        */
        $this->nameIsNotJoker($dolorSit);
        // $this->valueIsNotPrime($dolorSit);
        // $this->hasEnoughGunsToFight($dolorSit);
        // $this->heroIsNotInHospital($dolorSit);

        return $this;
    }

    // /**
    //  * Creating validation
    //  *
    //  * @param $dolorSit \App\Mainframe\Modules\Superheroes\DolorSit
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function creating($dolorSit)
    // {
    //     return parent::creating($dolorSit); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Updating validation
    //  *
    //  * @param $dolorSit \App\Mainframe\Modules\Superheroes\DolorSit
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function updating($dolorSit)
    // {
    //     return parent::updating($dolorSit); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  *  Deleting validation
    //  *
    //  * @param $dolorSit \App\Mainframe\Modules\Superheroes\DolorSit
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function deleting($dolorSit)
    // {
    //     return parent::deleting($dolorSit); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Restoring validation
    //  *
    //  * @param $dolorSit \App\Mainframe\Modules\Superheroes\DolorSit
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function restoring($dolorSit)
    // {
    //     return parent::restoring($dolorSit); // TODO: Change the autogenerated stub
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
     * @param $dolorSit \App\Mainframe\Modules\Superheroes\DolorSit
     * @return $this
     */
    private function nameIsNotJoker($dolorSit)
    {
        if ($dolorSit->name === 'Joker') {
            $this->invalidate('name', "Name can not be Joker");
        }

        return $this;
    }
}