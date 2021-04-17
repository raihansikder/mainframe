<?php

namespace App\Mainframe\Modules\Spreads;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;

class SpreadViewProcessor extends BaseModuleViewProcessor
{
    /**
     * @var \App\Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model
     * @var Spread $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var Spread
     */
    public $element;

    // Note: See parent class for available functions
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
    // public function getImmutables() { }
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