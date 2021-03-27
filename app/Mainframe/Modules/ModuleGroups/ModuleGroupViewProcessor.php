<?php

namespace App\Mainframe\Modules\ModuleGroups;

use App\Mainframe\Modules\ModuleGroups\Traits\ModuleGroupViewProcessorTrait;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModuleViewProcessor;

class ModuleGroupViewProcessor extends BaseModuleViewProcessor
{
    use ModuleGroupViewProcessorTrait;
}