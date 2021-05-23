<?php

namespace App\Mainframe\Modules\Packages;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Packages\Traits\PackageControllerTrait;

/**
 * @group  Packages
 * APIs for managing packages
 */
class PackageController extends ModularController
{
    use PackageControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'packages';


}
