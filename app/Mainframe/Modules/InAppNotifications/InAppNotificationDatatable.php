<?php

namespace App\Mainframe\Modules\InAppNotifications;

use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Modules\InAppNotifications\Traits\InAppNotificationDatatableTrait;

class InAppNotificationDatatable extends ModuleDatatable
{

    use InAppNotificationDatatableTrait;

    /** @var string[] HTML rendering enabled for columns */
    public $rawColumns = ['id', 'name', 'is_active'];

}