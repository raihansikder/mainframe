<?php

namespace App\Mainframe\Features\Report;

use App\Mainframe\Features\Core\ViewProcessor;

class ReportViewProcessor extends ViewProcessor
{

    /** @var \App\Mainframe\Features\Report\ReportBuilder */
    public $report;

    /** @var  string Directory location of the report blade templates */
    public $path;

    /** @var  \Illuminate\Database\Query\Builder|string|\Illuminate\Database\Eloquent\Model DB Table/View names */
    public $dataSource;

    /** @var array */
    public $columnOptions;

    /** @var array */
    public $selectedColumns;

    /** @var array */
    public $aliasColumns;

    /** @var int */
    public $total;

    /** @var  \Illuminate\Support\Collection Report result */
    public $result;

    /**
     * ReportViewProcessor constructor.
     *
     * @param $reportBuilder
     */
    public function __construct($reportBuilder)
    {
        parent::__construct();
        $this->report = $reportBuilder;

    }

    /**
     * @param  mixed  $path
     * @return ReportViewProcessor
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|string  $dataSource
     * @return ReportViewProcessor
     */
    public function setDataSource($dataSource)
    {
        $this->dataSource = $dataSource;

        return $this;
    }

    /**
     * @param  array  $columnOptions
     * @return ReportViewProcessor
     */
    public function setColumnOptions(array $columnOptions)
    {
        $this->columnOptions = $columnOptions;

        return $this;
    }

    /**
     * @param  array  $selectedColumns
     * @return ReportViewProcessor
     */
    public function setSelectedColumns(array $selectedColumns)
    {
        $this->selectedColumns = $selectedColumns;

        return $this;
    }

    /**
     * @param  array  $aliasColumns
     * @return ReportViewProcessor
     */
    public function setAliasColumns(array $aliasColumns)
    {
        $this->aliasColumns = $aliasColumns;

        return $this;
    }

    /**
     * @param  int  $total
     * @return ReportViewProcessor
     */
    public function setTotal(int $total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @param  \Illuminate\Support\Collection  $result
     * @return ReportViewProcessor
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * @param  \App\Mainframe\Features\Report\ReportBuilder  $report
     * @return ReportViewProcessor
     */
    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Transforms the values of a cell. This is useful for creating links, changing colors etc.
     *
     * @param        $column
     * @param        $row
     * @param        $value
     * @param  string  $module_name
     * @return string
     */
    public function transformRow($column, $row, $value, $module_name = null)
    {
        // linked to facility details page
        $new_value = $value;

        if (in_array($column, ['id', 'name'])) {
            if (isset($row->id) && $module_name) {
                $new_value = "<a href='".route($module_name.'.edit', $row->id)."'>".$value."</a>";
            }
        }

        return $new_value;
    }

}