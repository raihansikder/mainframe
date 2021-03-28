<?php

namespace App\Mainframe\Modules\PushNotifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy;
use App\Mainframe\Modules\PushNotifications\Traits\PushNotificationPolicyTrait;

class PushNotificationPolicy extends BaseModulePolicy
{
    use PushNotificationPolicyTrait;
}
