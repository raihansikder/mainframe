<?php

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Modules\Tenants\Traits\TenantPolicyTrait;
use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;

class TenantPolicy extends BaseModulePolicy
{

    use TenantPolicyTrait;
}
