<?php

namespace App\Mainframe\Modules\Notifications;

use App\Mainframe\Modules\Notifications\Traits\NotificationDatatableTrait;
use DB;
use App\Mainframe\Features\Datatable\ModuleDatatable;

class NotificationDatatable extends ModuleDatatable
{

   use NotificationDatatableTrait;

}