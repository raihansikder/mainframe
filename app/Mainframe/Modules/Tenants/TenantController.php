<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Features\Modular\ModularController\ModularController;

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
