<?php

namespace App\Mainframe\Modules\SuperHeroes;

/** @mixin SuperHero $this */
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
     *
     * return $this
     */
    public function populate()
    {
        // Todo: Remove this sample code
        // $this->fillAddress()->setAmounts();
        return $this;
    }

    /**
     * Set address
     * Todo: Remove this sample code
     * @return $this
     */
    // public function setAddress()
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
    | View helper functions
    |--------------------------------------------------------------------------
    | Functions that are used in views to shorted the length of logic inside
    | view blades. This are known as view shorthand functions.
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