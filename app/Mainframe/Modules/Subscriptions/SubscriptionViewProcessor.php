<?php

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Subscriptions\Traits\SubscriptionViewProcessorTrait;

class SubscriptionViewProcessor extends BaseModuleViewProcessor
{
    use SubscriptionViewProcessorTrait;
}