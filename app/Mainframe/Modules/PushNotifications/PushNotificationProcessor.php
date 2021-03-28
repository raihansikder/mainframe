<?php

namespace App\Mainframe\Modules\PushNotifications;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\PushNotifications\Traits\PushNotificationProcessorTrait;

class PushNotificationProcessor extends ModelProcessor
{
    use PushNotificationProcessorTrait;

    /*
    |--------------------------------------------------------------------------
    | Define properties and variables
    |--------------------------------------------------------------------------
    */
    /** @var PushNotification */
    public $element;
    // public $immutables;
    // public $transitions;
    // public $trackedFields;

}