<?php

namespace App\Mainframe\Modules\Contents\Traits;

use App\Mainframe\Modules\Contents\ContentViewProcessor;

/** @mixin ContentViewProcessor */
trait ContentViewProcessorTrait
{

    // Note: See parent class for available functions
    public function immutables()
    {
        if (!$this->user->isSuperUser()) {
            $this->addImmutables(['name', 'key','is_active']);
        }

        return $this->immutables;
    }

    /*
    |--------------------------------------------------------------------------
    | Section: Blade template locations
    |--------------------------------------------------------------------------
    */
    // public function formPath($state = 'create') { }
    // public function gridPath() { }
    // public function changesPath() { }
    /*
    |--------------------------------------------------------------------------
    | Section: View Variables
    |--------------------------------------------------------------------------
    */
    // public function varsCreate() { }
    // public function viewVarsEdit() { }
    // public function formTitle() { }

    /*
    |--------------------------------------------------------------------------
    | Section: Condition functions to show a section in view
    |--------------------------------------------------------------------------
    */
    // public function showFormCreateBtn() { }
    // public function showFormListBtn() { }
    // public function showReportLink() { }
    // public function showTenantSelector() { }

    /*
    |--------------------------------------------------------------------------
    | Section: Report related view helpers
    |--------------------------------------------------------------------------
    */

}