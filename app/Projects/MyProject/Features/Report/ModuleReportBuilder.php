<?php

namespace App\Projects\MyProject\Features\Report;

use App\Mainframe\Features\Report\Traits\ModuleReportBuilderTrait;
use App\Module;

class ModuleReportBuilder extends ReportBuilder
{
    use ModuleReportBuilderTrait;

    public function __construct(Module $module, $dataSource = null, $path = null, $cache = null)
    {
        $this->setModule($module);
        $this->enableAutoRun();
        parent::__construct($this->dataSource, $path, $cache);
    }

}