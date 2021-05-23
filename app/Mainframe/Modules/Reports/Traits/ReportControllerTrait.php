<?php

namespace App\Mainframe\Modules\Reports\Traits;

use App\Mainframe\Modules\Reports\ReportDatatable;

trait ReportControllerTrait
{
    /**
     * @return ReportDatatable
     */
    public function datatable()
    {
        return new ReportDatatable($this->module);
    }
}