<?php

namespace App\Mainframe\Modules\SuperHeroes;

/** @mixin SuperHeroProcessor $this */
trait SuperHeroProcessorHelper
{
    /*
    |--------------------------------------------------------------------------
    | Functions for deriving immutables & allowed transitions
    |--------------------------------------------------------------------------
    */
    /* Further customize immutables and allowed value transitions*/
    // public function getImmutables(){return $this->immutables; }
    // public function getTransitions(){return $this->transitions; }

    /*
    |--------------------------------------------------------------------------
    | Other helper functions
    |--------------------------------------------------------------------------
    */
    // Todo: Other helper functions

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    */

    // Todo: Functions for validation
    /**
     * @return $this
     */
    public function checkName()  // Example code
    {
        $element = $this->element; // Short hand variable.

        if ($element->name == 'Joker') {
            $this->error('Name can not be Joker', 'name');
        }

        return $this;
    }
}