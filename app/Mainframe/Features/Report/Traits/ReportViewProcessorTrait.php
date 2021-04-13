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
        return $this->report->filterPath();
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function initFunctionsPath()
    {
        return $this->report->initFunctionsPath();
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function ctaPath()
    {
        return $this->report->ctaPath();
    }

    /**
     * Path for functions blade
     *
     * @return string
     */
    public function advancedFilterPath()
    {
        return $this->report->advancedFilterPath();
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
        return $this->report->cell($column, $row, $route);
    }

    /**
     * Link to module element
     *
     * @param $row
     * @return string|null
     */
    public function elementViewUrl($row)
    {
        return $this->report->elementViewUrl($row);
    }

    /**
     * Excel download URL
     *
     * @return string
     */
    public function excelDownloadUrl()
    {
        return $this->report->excelDownloadUrl();
    }

    /**
     * Report print URL
     *
     * @return string
     */
    public function printUrl()
    {
        return $this->report->printUrl();
    }

    /**
     * Save report URL
     *
     * @return string
     */
    public function saveUrl()
    {
        return $this->report->saveUrl();
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
    public function columnTitle($index)
    {
        return $this->report->columnTitle($index);
    }

    public function sortAscIcon()
    {
        return $this->report->sortAscIcon();

    }

    public function sortDescIcon()
    {
        return $this->report->sortDescIcon();

    }

    public function sortDefaultIcon()
    {
        return $this->report->sortDefaultIcon();

    }

    public function buildUrl($params)
    {
        return $this->report->buildUrl($params);

    }

}