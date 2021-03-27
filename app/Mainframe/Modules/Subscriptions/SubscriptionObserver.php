<?php

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleObserver;
use App\Mainframe\Modules\Subscriptions\Traits\SubscriptionObserverTrait;

class SubscriptionObserver extends BaseModuleObserver
{
    use SubscriptionObserverTrait;
}