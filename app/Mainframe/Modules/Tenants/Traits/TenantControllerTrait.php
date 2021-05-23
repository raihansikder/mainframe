<?php

namespace App\Mainframe\Modules\Tenants\Traits;

use App\Mainframe\Modules\Tenants\TenantController;
use App\Mainframe\Modules\Tenants\TenantDatatable;

/** @mixin TenantController $this */
trait TenantControllerTrait
{

    /**
     * @return TenantDatatable
     */
    public function datatable()
    {
        return new TenantDatatable($this->module);
    }

}