<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;

class SuperHeroProcessor extends ModelProcessor
{
    /** @var \App\Mainframe\Modules\SuperHeroes\SuperHero */
    public $element;
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
     * @param  \App\Mainframe\Modules\SuperHeroes\SuperHero $element
     * @return $this
     */
    public function fill($element)
    {
        $element->populate();

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
     * @param  \App\Mainframe\Modules\SuperHeroes\SuperHero $element
     * @param  array $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:super_heroes,name,'.$element->id ?? 'null'.',id,deleted_at,NULL',
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

    /**
     * Custom attributes for the validation rules above.
     *
     * @param  array $merge
     * @return array
     */
    // public static function customAttributes($merge = [])
    // {
    //     $attributes = [];
    //
    //     return array_merge($attributes, $merge);
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
     * @param SuperHero $element
     * @return $this
     */
    public function saving($element)
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
     * @param SuperHero $element
     * @return $this
     */
    // public function creating($element) { return $this; }

    /**
     * Updating validation
     *
     * @param SuperHero $element
     * @return $this
     */
    // public function updating($element) { return $this; }

    /**
     * Do something after creation
     *
     * @param SuperHero $element
     * @return $this
     */
    // public function created($element) { return $this; }

    /**
     * Do something after update
     *
     * @param SuperHero $element
     * @return $this
     */
    // public function updated($element) { return $this; }

    /**
     * Do something after saved(common for updated and created)
     *
     * @param SuperHero $element
     * @return $this
     */
    // public function saved($element) { return $this; }

    /**
     *  Deleting validation
     *
     * @param SuperHero $element
     * @return $this
     */
    // public function deleting($element) { return $this; }

    /**
     *  Deleting validation
     *
     * @param SuperHero $element
     * @return $this
     */
    // public function deleted($element) { return $this; }

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
        $element = $this->element;

        if ($element->name == 'Joker') {
            $this->error('Name can not be Joker', 'name');
            // Same as
            $this->fieldError('name', 'Name can not be Joker');
        }

        return $this;
    }
}