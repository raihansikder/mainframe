<?php

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Features\Modular\ModularController\ModularController;
/**
 * @group  Tenants
 * APIs for managing tenants
 */
class TenantController extends ModularController
{

    /*
     |--------------------------------------------------------------------------
     | Module definitions
     |--------------------------------------------------------------------------
     |
     */
    protected $moduleName = 'tenants';

    /**
     * @return TenantDatatable
     */
    public function datatable()
    {
        return new TenantDatatable($this->module);
    }
}
