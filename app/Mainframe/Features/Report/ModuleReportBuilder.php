<?php

namespace App\Mainframe\Features\Report;

use App\Mainframe\Modules\Modules\Module;

class ModuleReportBuilder extends ReportBuilder
{
    public $module;
    public $model;

    public function __construct(Module $module, $dataSource = null, $baseDir = null, $cache = 0)
    {

        $this->module = $module;
        $this->model = $this->module->modelInstance();
        $this->dataSource = $dataSource ?: $this->module->tableName();

        parent::__construct($this->dataSource, $baseDir, $cache);
    }

    /**
     * Query select table
     *
     * @return \Illuminate\Database\Query\Builder||\Illuminate\Database\Eloquent\Builder
     */
    public function queryDataSource()
    {

        if (request('with')) {
            return $this->model->with(explode(',', request('with')));
        }

        return $this->model;
    }

}