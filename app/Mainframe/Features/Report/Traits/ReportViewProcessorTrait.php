<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Features\Report\ReportBuilder;
use App\Mainframe\Features\Report\ReportViewProcessor;
use App\Report;

/** @mixin ReportViewProcessor $this */
trait ReportViewProcessorTrait
{

    /** @var ReportBuilder|mixed */
    public $report;

    public function setReport($report)
    {
        $this->report = $report;

        return $this;
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

    /*
    |--------------------------------------------------------------------------
    | Proxy function
    |--------------------------------------------------------------------------
    |
    | These functions already exists in the report. However, there can be
    | cases where the same report is rendered using different view
    | processors. In that case these function can be overriden
    | and used.
    |
    */

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
     * Table column titles
     *
     * @param $index
     * @return string
     */
    public function columnTitle($index)
    {
        return $this->report->columnTitle($index);
    }

    /**
     * Sort icon Asc
     *
     * @return string
     */
    public function sortAscIcon()
    {
        return $this->report->sortAscIcon();

    }

    /**
     * Sort icon Desc
     *
     * @return string
     */
    public function sortDescIcon()
    {
        return $this->report->sortDescIcon();

    }

    /**
     * Default sort icon
     *
     * @return string
     */
    public function sortDefaultIcon()
    {
        return $this->report->sortDefaultIcon();

    }

    /**
     * Construct the full report url from request params
     *
     * @param array $params
     * @return string
     */
    public function buildUrl($params = [])
    {
        return $this->report->buildUrl($params);

    }

}