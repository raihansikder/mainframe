<?php

namespace App\Mainframe\Modules\Notifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Mainframe\Modules\Notifications\Traits\NotificationObserverTrait;

class NotificationObserver extends BaseModuleObserver
{
    use NotificationObserverTrait;
}