<?php

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Countries\Traits\CountryControllerTrait;

/**
 * @group  Countries
 * APIs for managing countries
 */
class CountryController extends ModularController
{
    use CountryControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'countries';


}
