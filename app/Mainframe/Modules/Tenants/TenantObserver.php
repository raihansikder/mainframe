<?php

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Mainframe\Modules\Tenants\Traits\TenantObserverTrait;

class TenantObserver extends BaseModuleObserver
{
    use TenantObserverTrait;
}