<?php

namespace App\Mainframe\Features\Report;

use App\Mainframe\Modules\Modules\Module;

class ModuleReportBuilder extends ReportBuilder
{
    public $module;
    public $model;

    public function __construct(Module $module, $dataSource = null, $path = null, $cache = null)
    {

        $this->module = $module;
        $this->model = $this->module->modelInstance();
        $this->dataSource = $dataSource ?: $this->module->module_table;

        parent::__construct($this->dataSource, $path, $cache);
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