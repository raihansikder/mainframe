<?php

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;

class SubscriptionProcessor extends ModelProcessor
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
     * @param  \App\Mainframe\Modules\Subscriptions\Subscription  $subscription
     * @return $this
     */
    public function fill($subscription)
    {
        parent::fill($subscription);

        // $subscription->name = 'Lorem Ipsum';

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
     * @param  \App\Mainframe\Modules\Subscriptions\Subscription  $subscription
     * @param  array  $merge
     * @return array
     */
    public static function rules($subscription, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:subscriptions,name,'.(isset($subscription->id) ? (string) $subscription->id : 'null').',id,deleted_at,NULL',
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
     * @param $subscription \App\Mainframe\Modules\Superheroes\Subscription
     * @return $this
     */
    public function saving($subscription)
    {
        parent::saving($subscription);
        /*
        |--------------------------------------------------------------------------
        | Call validation functions one by one.
        |--------------------------------------------------------------------------
        |
        | A list of functions that will be called sequentially to validate the model
        */
        $this->nameIsNotJoker($subscription);
        // $this->valueIsNotPrime($subscription);
        // $this->hasEnoughGunsToFight($subscription);
        // $this->heroIsNotInHospital($subscription);

        return $this;
    }

    // /**
    //  * Creating validation
    //  *
    //  * @param $subscription \App\Mainframe\Modules\Superheroes\Subscription
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function creating($subscription)
    // {
    //     return parent::creating($subscription); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Updating validation
    //  *
    //  * @param $subscription \App\Mainframe\Modules\Superheroes\Subscription
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function updating($subscription)
    // {
    //     return parent::updating($subscription); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  *  Deleting validation
    //  *
    //  * @param $subscription \App\Mainframe\Modules\Superheroes\Subscription
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function deleting($subscription)
    // {
    //     return parent::deleting($subscription); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Restoring validation
    //  *
    //  * @param $subscription \App\Mainframe\Modules\Superheroes\Subscription
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function restoring($subscription)
    // {
    //     return parent::restoring($subscription); // TODO: Change the autogenerated stub
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
     * @param $subscription \App\Mainframe\Modules\Superheroes\Subscription
     * @return $this
     */
    private function nameIsNotJoker($subscription)
    {
        if ($subscription->name === 'Joker') {
            $this->fieldError('name', "Name can not be Joker");
        }

        return $this;
    }
}