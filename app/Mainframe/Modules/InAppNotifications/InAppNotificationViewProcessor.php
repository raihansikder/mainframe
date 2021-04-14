<?php

namespace App\Mainframe\Modules\InAppNotifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\InAppNotifications\Traits\InAppNotificationViewProcessorTrait;

class InAppNotificationViewProcessor extends BaseModuleViewProcessor
{
    use InAppNotificationViewProcessorTrait;

    /**
     * @var \App\Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model
     * @var InAppNotification $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var InAppNotification
     */
    public $element;

}