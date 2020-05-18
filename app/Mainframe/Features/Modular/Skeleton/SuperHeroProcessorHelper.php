<?php

namespace App\Mainframe\Modules\SuperHeroes;

/** @mixin SuperHeroProcessor $this */
trait SuperHeroProcessorHelper
{

    /*
    |--------------------------------------------------------------------------
    | Functions for deriving immutables
    |--------------------------------------------------------------------------
    |
    */

    // Todo: Functions for deriving immutables

    /*
    |--------------------------------------------------------------------------
    | Other helper functions
    |--------------------------------------------------------------------------
    |
    */

    // Todo: Other helper functions

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    |
    */

    // Todo: Functions for validation
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
}