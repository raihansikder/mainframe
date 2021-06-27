<?php

namespace App\Mainframe\Modules\Reports;

use App\Mainframe\Features\Datatable\ModuleDatatable;
use App\Mainframe\Modules\Reports\Traits\ReportDatatableTrait;

class ReportDatatable extends ModuleDatatable
{
    use ReportDatatableTrait;

    public $moduleName = 'reports';

}