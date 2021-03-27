<?php

namespace App\Mainframe\Modules\InAppNotifications;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\InAppNotifications\Traits\InAppNotificationProcessorTrait;

class InAppNotificationProcessor extends ModelProcessor
{
    use InAppNotificationProcessorTrait;

    /** @var InAppNotification */
    public $element;

}