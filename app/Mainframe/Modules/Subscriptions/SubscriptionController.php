<?php

namespace App\Mainframe\Modules\Subscriptions;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Subscriptions\Traits\SubscriptionControllerTrait;

/**
 * @group  Subscriptions
 * APIs for managing subscriptions
 */
class SubscriptionController extends ModularController
{
    use SubscriptionControllerTrait;


    /*
     |--------------------------------------------------------------------------
     | Module definitions
     |--------------------------------------------------------------------------
     |
     */
    protected $moduleName = 'subscriptions';

}
