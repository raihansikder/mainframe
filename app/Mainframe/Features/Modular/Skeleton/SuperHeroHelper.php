<?php

namespace App\Mainframe\Modules\SuperHeroes;

/** @mixin \App\Mainframe\Modules\SuperHeroes\SuperHero $this */
trait SuperHeroHelper
{
    /*
    |--------------------------------------------------------------------------
    | Autofill and functions to calculated field updates
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Fill data and set calculated data in fields for saving the module
     * This can depend of supporting fillFunct, setFunct,calculateFunct
     */
    public function populate()
    {
        // Sample
        // $this->fillAddress()->setAmounts();
        return $this;
    }

    /**
     * Fill address
     *
     * @return $this
     */
    // public function fillAddress()
    // {
    //     $this->field = 'val';
    //     return $this;
    // }

    /*
    |--------------------------------------------------------------------------
    | Non-static helper functions
    |--------------------------------------------------------------------------
    |
    */

    // Write code here

    /*
    |--------------------------------------------------------------------------
    | Static helper functions
    |--------------------------------------------------------------------------
    |
    */

    // Write code here

    /*
    |--------------------------------------------------------------------------
    | Ability to create, edit, delete or restore
    |--------------------------------------------------------------------------
    |
    | An element can be editable or non-editable based on it's internal status
    | This is not related to any user, rather it is a model's individual sate
    | For example - A confirmed quotation should not be editable regardless
    | Of who is attempting to edit it.
    |
    */

    // public function isViewable() { return true; }

    // public function isCreatable() { return true; }

    // public function isEditable(){return true; }

    // public function isDeletable(){return true; }

}