<?php

namespace App\Mainframe\Modules\Groups;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Groups\Traits\GroupControllerTrait;

/**
 * @group  Groups
 * APIs for managing groups
 */
class GroupController extends ModularController
{
    use GroupControllerTrait;

    protected $moduleName = 'groups';


}
