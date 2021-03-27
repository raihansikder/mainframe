<?php

namespace App\Mainframe\Modules\Notifications;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Notifications\Traits\NotificationProcessorTrait;

class NotificationProcessor extends ModelProcessor
{
    use NotificationProcessorTrait;
}