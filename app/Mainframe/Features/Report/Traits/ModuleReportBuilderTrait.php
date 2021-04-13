<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportBuilder;
use App\Mainframe\Helpers\Convert;
use Illuminate\Database\Query\Builder;

/** @mixin ReportBuilder $this */
trait ModuleReportBuilderTrait
{

    /**
     * Transform request inputs
     */
    public function transformRequest()
    {
        # Hide inactive items for non-admins
        if (!$this->user->isSuperUser()) {
            request()->merge(['is_active' => 1,]);
        }
    }

    /**
     * Query to initially select table or a model.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|Builder
     */
    public function queryDataSource()
    {

        // Source is a table
        if (is_string($this->dataSource)) {
            return \DB::table($this->dataSource);
        }

        return $this->dataSource;

    }

    /**
     * @param $module
     */
    public function setModule($module)
    {
        $this->module = $module;
        $this->model = $this->module->modelInstance();
        $this->dataSource = $this->model;

        if (request('with')) {
            $this->dataSource->with(explode(',', request('with')));
        }
    }

    /**
     * Default select id column to link to module details page
     *
     * @return string[]
     */
    public function defaultSelectedColumns()
    {
        return ['id'];
    }

    /**
     * By default show a limited number of columns in module report
     *
     * @return array|string[]
     */
    public function selectedColumns()
    {
        if (request('columns_csv')) {
            return Convert::csvToArray(request('columns_csv'));
        }

        // return $this->model->tableColumns();

        return ['id', 'name', 'created_at', 'updated_at',];
    }

}