<?php

namespace App\Mainframe\Modules\Contents;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Content;
use App\Mainframe\Modules\Contents\Traits\ContentObserverTrait;

class ContentObserver extends BaseModuleObserver
{
    use ContentObserverTrait;

}