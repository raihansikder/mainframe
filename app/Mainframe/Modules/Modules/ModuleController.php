<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Modules\Traits\ModuleControllerTrait;

/**
 * @group  Modules
 * APIs for managing modules
 */
class ModuleController extends ModularController
{
    use ModuleControllerTrait;

    protected $moduleName = 'modules';

}