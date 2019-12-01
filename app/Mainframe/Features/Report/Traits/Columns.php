<?php

namespace App\Mainframe\Features\Report\Traits;

use Str;
use Cache;
use Schema;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder $this */
trait Columns
{
    /**
     * Show this in a selection option in the front-end
     *
     * @return array
     */
    public function columnOptions()
    {
        return array_merge($this->dataSourceColumns(), $this->ghostSelectColumns());
    }

    /**
     * Some times we need to pass column names that do not exists in the model/table.
     * This should not be considered in query building. Rather we want this to be
     * post processed in mutation function.
     *
     * @return array
     */
    public function ghostSelectColumns()
    {
        return [];
    }

    /**
     * Get the data source field|columns names
     *
     * @return mixed|null
     */
    public function dataSourceColumns()
    {

        if (is_string($this->dataSource)) {

            return Cache::remember('columns-of:'.$this->dataSource, cacheTime('very-long'), function () {
                return Schema::getColumnListing($this->dataSource);
            });
        }

        return [];
    }

    /**
     * Returns an array of columns selected from the form input.If none
     * selected then by default all the columns are selected.
     *
     * @return array
     */
    public function selectedColumns()
    {

        if (strlen($this->selectedColumnsCsv())) {
            return $this->cleanArray(explode(',', $this->selectedColumnsCsv()));
        }

        return $this->dataSourceColumns();
    }

    /**
     * Convert input csv to array
     *
     * @return mixed
     */
    public function selectedColumnsCsv()
    {
        return $this->cleanCsv(request('columns_csv'));
    }

    /**
     * This function gives an option to modify $selectedColumns array for output.
     * $selectedColumns array has the initial column names from the SQL query result.
     * These columns are finally printed in report out put.
     *
     * @param $selectedColumns
     * @return array
     */
    public function mutateSelectedColumns()
    {
        $selectedColumns = $this->selectedColumns();
        $merge = [];

        if ($this->groupByFields()) {
            $merge = array_merge($merge, $this->additionalSelectedColumnsDueToGroupBy());
        }

        return array_merge($selectedColumns, $merge);
    }

    /**
     * Change alias column array for output
     *
     * @param $aliasColumns
     * @return array
     */
    public function mutateAliasColumns()
    {
        $aliasColumns = $this->aliasColumns();
        $merge = [];

        if ($this->groupByFields()) {
            $merge = array_merge($merge, $this->additionalAliasColumnsDueToGroupBy());
        }

        return array_merge($aliasColumns, $merge);
    }

    /**
     * This function returns an array of Titles/Column aliases that are mapped with
     * each $selectedColumns. This usually comes from the inputs as CSV.
     * If no input found then this arrays is constructed based on $selectedColumns.
     *
     * @return array
     */
    public function aliasColumns()
    {
        if (strlen($this->aliasColumnsCsv())) {
            $keys = $this->cleanArray(explode(',', $this->aliasColumnsCsv()));
        } else {
            $keys = $this->selectedColumns();
        }

        if (count($keys) <= count($this->selectedColumns())) {
            $keys = $this->fillAliasColumns($keys);
        }

        if (count($keys) > count($this->selectedColumns())) {
            $keys = array_slice($keys, count($this->selectedColumns()));
        }

        return $keys;
    }

    /**
     * Get column as csv and clean
     *
     * @return mixed
     */
    public function aliasColumnsCsv()
    {
        return $this->cleanCsv(request('alias_columns_csv'));
    }

    public function fillAliasColumns($keys)
    {
        $sliced = array_slice($this->selectedColumns(), count($keys));

        $keys = array_merge($keys, $sliced);

        $temp = [];
        foreach ($keys as $key) {
            $temp[] = Str::title(str_replace('_', ' ', $key));
        }

        return $temp;
    }
}