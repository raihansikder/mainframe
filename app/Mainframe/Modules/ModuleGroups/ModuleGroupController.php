<?php

namespace App\Mainframe\Modules\ModuleGroups;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\ModuleGroups\Traits\ModuleGroupControllerTrait;

/**
 * @group  Module-groups
 * APIs for managing module-groups
 */
class ModuleGroupController extends ModularController
{

    use ModuleGroupControllerTrait;

    protected $moduleName = 'module-groups';

}
