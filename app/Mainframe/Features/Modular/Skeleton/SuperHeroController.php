<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Features\Report\ModuleList;

/**
 * @group  SuperHero
 * APIs for managing super-heroes
 */
class SuperHeroController extends ModularController
{
    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'super-heroes';

    /*
    |--------------------------------------------------------------------------
    | Existing Controller functions
    |--------------------------------------------------------------------------
    | Override the following list of functions to customize the behavior of the controller
    */
    /**
     * SuperHero Datatable
     * @return SuperHeroDatatable
     */
    public function datatable()
    {
        return new SuperHeroDatatable($this->module);
    }

    /**
     * List SuperHero
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
    }

    // public function report() { }
    // public function transformInputRequests() { }
    // public function storeRequestValidator() { }
    // public function updateRequestValidator() { }
    // public function saveRequestValidator() { }
    // public function attemptStore() { }
    // public function attemptUpdate() { }
    // public function attemptDestroy() { }
    // public function stored() { }
    // public function updated() { }
    // public function saved() { }
    // public function deleted() { }

    /*
    |--------------------------------------------------------------------------
    | Custom Controller functions
    |--------------------------------------------------------------------------
    | Write down additional controller functions that might be required for your project to handle bu
    */

}
