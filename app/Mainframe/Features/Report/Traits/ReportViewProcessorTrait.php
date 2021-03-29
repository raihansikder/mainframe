<?php

namespace App\Mainframe\Features\Report\Traits;

trait ReportViewProcessorTrait
{
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

        // Add link
        if (in_array($column, ['id', 'name']) && $route) {
            $newValue = "<a href='{$route}'>".$row->$column."</a>";
        }

        return $newValue;
    }
}