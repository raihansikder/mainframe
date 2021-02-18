<?php

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Countries
 *
 * APIs for managing countries
 */
class CountryController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'countries';

    /**
     * @return CountryDatatable
     */
    public function datatable()
    {
        return new CountryDatatable($this->module);
    }
}
