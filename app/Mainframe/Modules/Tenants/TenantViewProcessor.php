<?php

namespace App\Mainframe\Modules\Tenants;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Tenants\Traits\TenantViewProcessorTrait;

class TenantViewProcessor extends BaseModuleViewProcessor
{
    use TenantViewProcessorTrait;
}