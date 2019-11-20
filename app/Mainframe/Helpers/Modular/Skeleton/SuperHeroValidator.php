<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Helpers\Modular\Validator\ModelValidator;

class SuperHeroValidator extends ModelValidator
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
     * @param  \App\Mainframe\Modules\SuperHeroes\SuperHero  $superHero
     * @return $this
     */
    public function fill($superHero)
    {
        parent::fill($superHero);

        // $superHero->name = 'Lorem Ipsum';

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
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param  \App\Mainframe\Modules\SuperHeroes\SuperHero  $superHero
     * @param  array  $merge
     * @return array
     */
    public static function rules($superHero, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:super_heroes,name,'.(isset($superHero->id) ? (string) $superHero->id : 'null').',id,deleted_at,NULL',
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
     * @param $superHero \App\Mainframe\Modules\Superheroes\SuperHero
     * @return $this
     */
    public function saving($superHero)
    {
        parent::saving($superHero);
        /*
        |--------------------------------------------------------------------------
        | Call validation functions one by one.
        |--------------------------------------------------------------------------
        |
        | A list of functions that will be called sequentially to validate the model
        */
        $this->nameIsNotJoker($superHero);
        // $this->valueIsNotPrime($superHero);
        // $this->hasEnoughGunsToFight($superHero);
        // $this->heroIsNotInHospital($superHero);

        return $this;
    }

    // /**
    //  * Run validations for creating. This should always call the saving().
    //  *
    //  * @param $superHero \App\Mainframe\Modules\Superheroes\SuperHero
    //  * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function creating($superHero)
    // {
    //     return parent::creating($superHero); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Run validations for updating. This should always call the saving().
    //  *
    //  * @param $superHero \App\Mainframe\Modules\Superheroes\SuperHero
    //  * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function updating($superHero)
    // {
    //     return parent::updating($superHero); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Run validations for deleting.
    //  *
    //  * @param $superHero \App\Mainframe\Modules\Superheroes\SuperHero
    //  * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function deleting($superHero)
    // {
    //     return parent::deleting($superHero); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Run validations for restoring. This should always call the saving().
    //  *
    //  * @param $superHero \App\Mainframe\Modules\Superheroes\SuperHero
    //  * @return \App\Mainframe\Helpers\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function restoring($superHero)
    // {
    //     return parent::restoring($superHero); // TODO: Change the autogenerated stub
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
     * @param $superHero \App\Mainframe\Modules\Superheroes\SuperHero
     * @return $this
     */
    private function nameIsNotJoker($superHero)
    {
        if ($superHero->name === 'Joker') {
            $this->invalidate('name', "Name can not be Joker");
        }

        return $this;
    }
}