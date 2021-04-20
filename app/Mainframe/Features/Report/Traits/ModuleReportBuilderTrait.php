<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportBuilder;
use App\Mainframe\Helpers\Convert;
use App\Module;
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
     * @param $module
     */
    public function setModule($module)
    {
        if (is_string($module)) {
            $module = Module::byName('invoices');
        }

        $this->module = $module;
        $this->model = $this->module->modelInstance();
    }

    public function viewProcessor()
    {
        return $this->model->viewProcessor();
    }

    /**
     * Default select id column to link to module details page
     *
     * @return string[]
     */
    public function defaultColumns()
    {
        // return ['id'];
        return $this->model->tableColumns();
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

        return ['id', 'name', 'created_at', 'updated_at',];
    }

}