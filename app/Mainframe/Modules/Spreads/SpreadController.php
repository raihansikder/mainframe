<?php

namespace App\Mainframe\Modules\Spreads;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Features\Report\ModuleList;

/**
 * @group  Spread
 * APIs for managing spreads
 */
class SpreadController extends ModularController
{
    // Note: Pull in necessary traits

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'spreads';

    /*
    |--------------------------------------------------------------------------
    | Existing Controller functions
    |--------------------------------------------------------------------------
    | Override the following list of functions to customize the behavior of the controller
    */
    /**
     * Spread Datatable
     * @return SpreadDatatable
     */
    public function datatable()
    {
        return new SpreadDatatable($this->module);
    }

    /**
     * List Spread
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
