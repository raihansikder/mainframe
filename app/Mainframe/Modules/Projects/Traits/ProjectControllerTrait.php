<?php

namespace App\Mainframe\Modules\Projects\Traits;

use App\Mainframe\Modules\Projects\ProjectDatatable;

trait ProjectControllerTrait
{
    /**
     * @return ProjectDatatable
     */
    public function datatable()
    {
        return new ProjectDatatable($this->module);
    }

}