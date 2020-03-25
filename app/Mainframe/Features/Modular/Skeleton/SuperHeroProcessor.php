<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;

class SuperHeroProcessor extends ModelProcessor
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
     * @param  \App\Mainframe\Modules\SuperHeroes\SuperHero $superHero
     * @return $this
     */
    public function fill($superHero)
    {
        parent::fill($superHero);
        $superHero->populate();

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
     * @param  \App\Mainframe\Modules\SuperHeroes\SuperHero $superHero
     * @param  array $merge
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

    /**
     * Custom error messages.
     *
     * @param  array $merge
     * @return array
     */
    // public static function customErrorMessages($merge = [])
    // {
    //     $messages = [];
    //
    //     return array_merge($messages, $merge);
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
     * @param SuperHero $superHero
     * @return $this
     */
    public function saving($superHero)
    {
        /*
        |--------------------------------------------------------------------------
        | Call validation functions one by one.
        |--------------------------------------------------------------------------
        |
        | A list of functions that will be called sequentially to validate the model
        */
        $this->validateName();

        return $this;
    }

    /**
     * Creating validation
     *
     * @param SuperHero $superHero
     * @return $this
     */
    // public function creating($superHero) { return $this; }

    /**
     * Updating validation
     *
     * @param SuperHero $superHero
     * @return $this
     */
    // public function updating($superHero) { return $this; }

    /**
     * Do something after creation
     *
     * @param SuperHero $superHero
     * @return $this
     */
    // public function created($superHero) { return $this; }

    /**
     * Do something after update
     *
     * @param SuperHero $superHero
     * @return $this
     */
    // public function updated($superHero) { return $this; }

    /**
     * Do something after saved(common for updated and created)
     *
     * @param SuperHero $superHero
     * @return $this
     */
    // public function saved($superHero) { return $this; }

    /**
     *  Deleting validation
     *
     * @param SuperHero $superHero
     * @return $this
     */
    // public function deleting($superHero) { return $this; }

    /**
     *  Deleting validation
     *
     * @param SuperHero $superHero
     * @return $this
     */
    // public function deleted($superHero) { return $this; }


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
    public function validateName()
    {
        $superHero = $this->element;

        if ($superHero->name == 'Joker') {
            $this->error('Name can not be Joker', 'name');
            // Same as
            $this->fieldError('name', 'Name can not be Joker');
        }

        return $this;
    }
}