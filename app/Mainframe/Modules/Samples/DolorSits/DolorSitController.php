<?php

namespace App\Mainframe\Modules\Samples\DolorSits;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Dolor-sits
 * APIs for managing dolor-sits
 */
class DolorSitController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'dolor-sits';

    /**
     * @return DolorSitDatatable
     */
    public function datatable()
    {
        return new DolorSitDatatable($this->module);
    }
}
