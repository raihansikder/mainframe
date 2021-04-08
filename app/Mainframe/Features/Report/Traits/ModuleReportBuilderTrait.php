<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Helpers\Convert;

trait ModuleReportBuilderTrait
{
    /** @var \App\Mainframe\Modules\Modules\Module */
    public $module;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed */
    public $model;

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
     * Query select table
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder
     */
    public function queryDataSource()
    {

        if (request('with')) {
            return $this->model->with(explode(',', request('with')));
        }

        // Source is a table
        if (is_string($this->dataSource)) {
            return \DB::table($this->dataSource);
        }

        if ($this->dataSource) {
            return $this->dataSource;
        }

        return $this->model;
    }

    /**
     * @param $module
     */
    public function setModule($module)
    {
        $this->module = $module;
        $this->model = $this->module->modelInstance();
        $this->dataSource = $this->model;
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

        return [
            'id', 'name', 'created_at', 'updated_at',
        ];
    }

}