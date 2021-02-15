<?php

namespace App\Mainframe\Features\Report;

use App\Mainframe\Features\Core\ViewProcessor;

class ReportViewProcessor extends ViewProcessor
{

    /** @var \App\Mainframe\Features\Report\ReportBuilder */
    public $report;

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

    /**
     * Transforms the values of a cell. This is useful for creating links, changing colors etc.
     *
     * @param        $column
     * @param        $row
     * @param  string  $route
     * @return string
     */
    public function cell($column, $row, $route = null)
    {
        // linked to facility details page
        $newVal = $row->$column;

        if (in_array($column, ['id', 'name']) && $route) {

                $newVal = "<a href='{$route}'>".$row->$column."</a>";
        }

        return $newVal;
    }

}