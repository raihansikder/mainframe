<?php

namespace App\Mainframe\Http\Reports;

use App\Mainframe\Features\Report\ReportBuilder;
use App\Mainframe\Features\Report\Traits\ModuleReportBuilderTrait;
use App\Mainframe\Modules\Modules\Module;

class ActiveUsers extends ReportBuilder
{
    use ModuleReportBuilderTrait;

    public function __construct()
    {
        $this->module = Module::byName('users');
        $this->model = $this->module->modelInstance();
        $this->dataSource = 'users';

        parent::__construct();
    }

}