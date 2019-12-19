<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class TenantController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('tenants');
    }

    /**
     * @return TenantDatatable
     */
    public function datatable()
    {
        return new TenantDatatable($this->module);
    }
}
