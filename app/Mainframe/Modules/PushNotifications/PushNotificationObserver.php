<?php

namespace App\Mainframe\Modules\PushNotifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Mainframe\Modules\PushNotifications\Traits\PushNotificationObserverTrait;

class PushNotificationObserver extends BaseModuleObserver
{
    use PushNotificationObserverTrait;
}