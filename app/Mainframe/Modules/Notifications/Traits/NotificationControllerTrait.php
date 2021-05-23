<?php

namespace App\Mainframe\Modules\Notifications\Traits;

use App\Mainframe\Modules\Notifications\NotificationDatatable;

trait NotificationControllerTrait
{

    /**
     * @return NotificationDatatable
     */
    public function datatable()
    {
        return new NotificationDatatable($this->module);
    }
}