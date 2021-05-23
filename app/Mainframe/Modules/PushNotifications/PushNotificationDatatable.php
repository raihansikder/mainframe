<?php

namespace App\Mainframe\Modules\PushNotifications;

use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Modules\PushNotifications\Traits\PushNotificationDatatableTrait;

class PushNotificationDatatable extends ModuleDatatable
{
    use PushNotificationDatatableTrait;

    /** @var string[] HTML rendering enabled for columns */
    public $rawColumns = ['id', 'name', 'is_active'];

}