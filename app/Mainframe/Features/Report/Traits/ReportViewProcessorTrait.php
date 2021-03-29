<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Modules\Reports\Report;
use URL;

trait ReportViewProcessorTrait
{
    public function filterPath()
    {
        return $this->report->filterPath ?? $this->report->path.'.includes.filters';
    }

    public function initFunctionsPath()
    {
        return $this->report->initFunctionsPath ?? $this->report->path.'.includes.init-functions';
    }

    /**
     * Transforms the values of a cell. This is useful for creating links, changing colors etc.
     *
     * @param  string  $column
     * @param  \Illuminate\Database\Eloquent\Model|object|array  $row
     * @param  string  $value
     * @param  string|null  $moduleName
     * @return string|null
     */
    public function transformRow($column, $row, $value, $moduleName = null)
    {
        // linked to facility details page
        $newValue = $value;

        if (in_array($column, ['id', 'name'])) {
            if (isset($row->id) && $moduleName) {
                $newValue = "<a href='".route($moduleName.'.edit', $row->id)."'>".$value."</a>";
            }
        }

        return $newValue;
    }

    /**
     * Change the value of a cell
     *
     * @param  string  $column
     * @param  \Illuminate\Database\Eloquent\Model|object|array  $row
     * @param  string  $value
     * @param  string|null  $moduleName
     * @return string
     */
    public function customCell($column, $row, $value, $moduleName = null)
    {

        $newValue = $value;

        if (in_array($column, ['id', 'name'])
            && isset($row->id) && $moduleName) {
            $newValue = "<a href='".route($moduleName.'.edit', $row->id)."'>".$value."</a>";
        }

        return $newValue;
    }

    /**
     * Transforms the values of a cell. This is useful for creating links, changing colors etc.
     *
     * @param  string  $column
     * @param  \Illuminate\Database\Eloquent\Model|object|array  $row
     * @param  string  $route
     * @return string
     */
    public function cell($column, $row, $route = null)
    {
        if (!isset($row->$column)) {
            return null;
        }

        $newValue = $row->$column;

        if (!$route) {
            $route = $this->elementViewUrl($row);
        }

        // Add link
        if (in_array($column, ['id', 'name']) && $route) {
            $newValue = "<a href='{$route}'>".$row->$column."</a>";
        }

        return $newValue;
    }

    public function elementViewUrl($row)
    {
        if (!isset($this->report->module)) {
            return null;
        }

        if (!isset($row->id)) {
            return null;
        }

        return route($this->report->module->name.'.show', $row->id);
    }

    public function excelDownloadUrl()
    {
        return URL::full()."&ret=excel";
    }

    public function printUrl()
    {
        return URL::full()."&ret=print";
    }

    public function saveUrl()
    {
        return route('reports.create')
            .'?title='.request('report_name')
            .'&parameters='.urlencode(str_replace(route('home'), '', URL::full()));
    }

    public function showSaveReportBtn()
    {
        return $this->user->can('create', Report::class);
    }

}