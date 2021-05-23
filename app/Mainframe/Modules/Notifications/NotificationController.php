<?php

namespace App\Mainframe\Modules\Notifications;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Notifications\Traits\NotificationControllerTrait;

/**
 * @group  Notifications
 *
 * APIs for managing notifications
 */
class NotificationController extends ModularController
{
    use NotificationControllerTrait;
    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'notifications';


}
