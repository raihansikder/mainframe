<?php

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Modules\Tenants\Traits\TenantDatatableTrait;
use App\Mainframe\Features\Datatable\ModuleDatatable;

class TenantDatatable extends ModuleDatatable
{

    use TenantDatatableTrait;
}