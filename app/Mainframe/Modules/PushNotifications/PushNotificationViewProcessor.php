<?php

namespace App\Mainframe\Modules\PushNotifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\PushNotifications\Traits\PushNotificationViewProcessorTrait;

class PushNotificationViewProcessor extends BaseModuleViewProcessor
{
    use PushNotificationViewProcessorTrait;

    /**
     * @var \App\Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model
     * @var PushNotification $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var PushNotification
     */
    public $element;
}