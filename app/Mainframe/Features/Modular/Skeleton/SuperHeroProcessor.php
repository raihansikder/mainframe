<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;

class SuperHeroProcessor extends ModelProcessor
{
    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var SuperHero */
    public $element;
    // public $immutables
    // public $transitions

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
     * @param  SuperHero $element
     * @return $this
     */
    public function fill($element)
    {
        $element->populate();

        return $this;
    }

    /**
     * @param  SuperHero $element
     * @param  array $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|'.
                'unique:super_heroes,name,'.$element->id ?? 'null'.',id,deleted_at,NULL',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /* Further customize error messages and attribute names by overriding */
    // public function customErrorMessages($merge = [])
    // public static function customAttributes($merge = [])

    /*
    |--------------------------------------------------------------------------
    | Validation functions
    |--------------------------------------------------------------------------
    */
    /**
     * @return $this
     */
    public function validateName()  // Todo: Remove this sample code
    {
        $element = $this->element; // Short hand variable.

        if ($element->name == 'Joker') {
            $this->error('Name can not be Joker', 'name');
        }

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Execute calculations, validations and actions on different events
    |--------------------------------------------------------------------------
    */

    /**
     * @param SuperHero $element
     * @return $this
     */
    public function saving($element)
    {
        $this->validateName(); // Todo: Remove this sample code

        return $this;
    }

    // public function creating($element) { return $this; }
    // public function updating($element) { return $this; }
    // public function created($element) { return $this; }
    // public function updated($element) { return $this; }
    // public function saved($element) { return $this; }
    // public function deleting($element) { return $this; }
    // public function deleted($element) { return $this; }

}