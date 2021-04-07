<?php

namespace App\Projects\MyProject\Features\Report;

use App\Mainframe\Features\Report\Traits\ModuleReportBuilderTrait;
use App\Mainframe\Modules\Modules\Module;

class ModuleReportBuilder extends ReportBuilder
{
    use ModuleReportBuilderTrait;

    public function __construct(Module $module, $dataSource = null, $path = null, $cache = null)
    {
        $this->module = $module;
        $this->model = $this->module->modelInstance();
        $this->dataSource = $dataSource ?: $this->module->module_table;

        $this->enableAutoRun();

        parent::__construct($this->dataSource, $path, $cache);
    }

}