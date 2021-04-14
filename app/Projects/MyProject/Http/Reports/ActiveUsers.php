<?php

namespace App\Projects\MyProject\Http\Reports;

use App\Projects\MyProject\Features\Report\ReportBuilder;
use App\User;

class ActiveUsers extends ReportBuilder
{

    // use ModuleReportBuilderTrait;

    public function __construct()
    {
        // $this->module = Module::byName('users');
        // $this->model = $this->module->modelInstance();
        // $this->dataSource =$this->module->module_table;

        $this->dataSource = User::query();
        parent::__construct();

    }



}