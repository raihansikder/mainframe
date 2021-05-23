<?php

namespace App\Mainframe\Modules\InAppNotifications;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Features\Report\ModuleList;
use App\Mainframe\Modules\InAppNotifications\Traits\InAppNotificationControllerTrait;

/**
 * @group  InAppNotification
 * APIs for managing in-app-notifications
 */
class InAppNotificationController extends ModularController
{
    use InAppNotificationControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'in-app-notifications';



}
