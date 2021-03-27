<?php

namespace App\Mainframe\Modules\Groups;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Mainframe\Modules\Groups\Traits\GroupObserverTrait;

class GroupObserver extends BaseModuleObserver
{
    use GroupObserverTrait;
}