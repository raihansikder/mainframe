<?php

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Tenants\Traits\TenantControllerTrait;

/**
 * @group  Tenants
 * APIs for managing tenants
 */
class TenantController extends ModularController
{
    use TenantControllerTrait;

    /*
     |--------------------------------------------------------------------------
     | Module definitions
     |--------------------------------------------------------------------------
     |
     */
    protected $moduleName = 'tenants';


}
