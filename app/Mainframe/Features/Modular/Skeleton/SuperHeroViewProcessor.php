<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;

class SuperHeroViewProcessor extends BaseModuleViewProcessor
{
    /**
     * @var \App\Mainframe\Modules\Modules\Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model
     * @var SuperHero $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var SuperHero
     */
    public $element;

    // Note: See parent class for available functions
    /*
    |--------------------------------------------------------------------------
    | Blade template locations
    |--------------------------------------------------------------------------
    */
    // public function formPath($state = 'create') { }
    // public function gridPath() { }
    // public function changesPath() { }

    /*
    |--------------------------------------------------------------------------
    | View Variables
    |--------------------------------------------------------------------------
    */
    // public function varsCreate() { }
    // public function viewVarsEdit() { }
    // public function getImmutables() { }
    // public function formTitle() { }

    /*
    |--------------------------------------------------------------------------
    | Condition functions to show a section in view
    |--------------------------------------------------------------------------
    */
    // public function showFormCreateBtn() { }
    // public function showFormListBtn() { }
    // public function showReportLink() { }
    // public function showTenantSelector() { }

}