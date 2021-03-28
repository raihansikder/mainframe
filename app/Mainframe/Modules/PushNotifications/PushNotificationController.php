<?php

namespace App\Mainframe\Modules\PushNotifications;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\PushNotifications\Traits\PushNotificationControllerTrait;

/**
 * @group  PushNotification
 * APIs for managing push-notifications
 */
class PushNotificationController extends ModularController
{
    use PushNotificationControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'push-notifications';

}
