<?php

namespace App\Mainframe\Features\Report\Traits;

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
}