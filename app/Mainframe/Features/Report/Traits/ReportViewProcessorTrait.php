<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportViewProcessor;
use App\Mainframe\Modules\Reports\Report;
use Illuminate\Support\Str;
use URL;

/** @mixin ReportViewProcessor $this */
trait ReportViewProcessorTrait
{

    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Path for filter blade
     *
     * @return string
     */
    public function filterPath()
    {

        if (isset($this->report->filterPath)) {
            return $this->report->filterPath;
        }

        $paths = [
            $this->report->path.'.filters',
            $this->report->path.'.includes.filters',
            projectResources().'.layouts.report.includes.filter',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.filter';
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function initFunctionsPath()
    {
        if (isset($this->report->initFunctionsPath)) {
            return $this->report->initFunctionsPath;
        }

        $paths = [
            $this->report->path.'.init-functions',
            $this->report->path.'.includes.init-functions',
            projectResources().'.layouts.report.includes.init-functions',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.init-functions';
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function ctaPath()
    {
        if (isset($this->report->ctaPath)) {
            return $this->report->ctaPath;
        }

        $paths = [
            $this->report->path.'.cta',
            $this->report->path.'.includes.cta',
            projectResources().'.layouts.report.includes.cta',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.cta';
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function advancedFilterPath()
    {
        if (isset($this->report->ctaPath)) {
            return $this->report->ctaPath;
        }

        $paths = [
            $this->report->path.'.advanced',
            $this->report->path.'.includes.advanced',
            projectResources().'.layouts.report.includes.advanced',
        ];

        foreach ($paths as $path) {
            if (view()->exists($path)) {
                return $path;
            }
        }

        return 'mainframe.layouts.report.includes.advanced';
    }

    /**
     * Transforms the values of a cell. This is useful for creating links, changing colors etc.
     *
     * @param  string  $column
     * @param  \Illuminate\Database\Eloquent\Model|object|array  $row
     * @param  string  $value
     * @param  string|null  $moduleName
     * @return string|null
     * @deprecated use cell()
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

        /*---------------------------------
        | Additional logic
        |---------------------------------*/

        return $newValue;
    }

    /**
     * Link to module element
     *
     * @param $row
     * @return string|null
     */
    public function elementViewUrl($row)
    {
        if (!$this->report->module) {
            return null;
        }

        if (!isset($row->id)) {
            return null;
        }

        return route($this->report->module->name.'.show', $row->id);
    }

    /**
     * Excel download URL
     *
     * @return string
     */
    public function excelDownloadUrl()
    {
        $requests = request()->all();
        $requests['ret'] = 'excel';

        return $this->buildUrl($requests);
    }

    /**
     * Report print URL
     *
     * @return string
     */
    public function printUrl()
    {
        $requests = request()->all();
        $requests['ret'] = 'print';

        return $this->buildUrl($requests);
    }

    /**
     * Save report URL
     *
     * @return string
     */
    public function saveUrl()
    {
        $url = route('reports.create');
        $params = [
            'title' => request('report_name'),
            'parameters' => urlencode(str_replace(route('home'), '', URL::full())),
        ];

        return $url.'?'.http_build_query($params);
    }

    /**
     * Save permission
     *
     * @return mixed
     */
    public function showSaveReportBtn()
    {
        return $this->user->can('create', Report::class);
    }

    /**
     * @param $index
     * @return string
     */
    public function column($index)
    {
        $report = $this->report;

        $alias = $report->aliasColumns()[$index];
        $column = $report->selectedColumns()[$index];

        $orderBy = request('order_by');
        $linkCss = '';

        if ($orderBy) {

            if (Str::startsWith($orderBy, $column.' ASC')) {
                $orderBy = str_replace($column.' ASC', $column.' DESC', $orderBy);
                $icon = $this->sortAscIcon();
                $linkCss = 'btn btn-xs bg-red';
            } elseif (Str::startsWith($orderBy, $column.' DESC')) {
                $orderBy = str_replace($column.' DESC', $column.' ASC', $orderBy);
                $icon = $this->sortDescIcon();
                $linkCss = 'btn btn-xs bg-red';
            } else {
                // $orderBy .= ','.$column.' DESC'; // For multiple sorting
                $orderBy = $column.' ASC';
                $icon = $this->sortDefaultIcon();
            }
        } else {
            $orderBy = $column.' ASC';
            $icon = $this->sortDefaultIcon();
        }

        $requests = request()->all();
        $requests['order_by'] = $orderBy;
        $url = $this->buildUrl($requests);

        return $alias." <a class='{$linkCss}' href='{$url}'>{$icon}</a>";
    }

    public function sortAscIcon()
    {
        return "<i class='glyphicon glyphicon-sort-by-attributes'></i>";
    }

    public function sortDescIcon()
    {
        return "<i class='glyphicon glyphicon-sort-by-attributes-alt'></i>";
    }

    public function sortDefaultIcon()
    {
        return "<i class='glyphicon glyphicon-sort'></i>";
    }

    public function buildUrl($params)
    {
        return URL::current().'?'.http_build_query($params);
    }

}