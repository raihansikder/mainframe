<?php

namespace App\Mainframe\Features\Report\Traits;

use Str;
use Cache;
use Schema;
use App\Mainframe\Features\Helpers\Convert;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder $this */
trait Columns
{
    /*
    |--------------------------------------------------------------------------
    | Columns options
    |--------------------------------------------------------------------------
    |
    | In the front-end you can select from these options.
    |
    */
    /**
     * Show this in a selection option in the front-end. Apart from the actual
     * columns in the data source(table, view) you can also put some new
     * columns (ghost columns) om the list and based on the selection
     * by user you can show desired values for those ghost columns.
     *
     * @return array
     */
    public function columnOptions()
    {
        return array_merge($this->dataSourceColumns(), $this->ghostColumnOptions());
    }

    /**
     * Some times we need to pass column names that do not exists in the model/table.
     * This should not be considered in query building. Rather we want this to be
     * post processed in mutation function.
     *
     * @return array
     */
    public function ghostColumnOptions()
    {
        return [];
    }

    /**
     * Get the data source field|columns names from SQL table/view
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


    /*
    |--------------------------------------------------------------------------
    | Selected columns
    |--------------------------------------------------------------------------
    |
    | Selected columns from the front-end. Also inject some automatic selection.
    |
    */

    /**
     * User selected columns
     *
     * @return array
     */
    public function selectedColumns()
    {

        if (request('columns_csv')) {
            return Convert::csvToArray(request('columns_csv'));
        }

        return $this->dataSourceColumns();
    }

    /**
     * Alter the selected columns for output. i.e.printing in the view blade.
     * These columns are finally shown in the html/output. Note when you
     * use 'group by' usually there is a default 'total' field that
     * needs to be shown in addition to all the selected columns.
     * This is also added by this array mutator.
     *
     * @return array
     */
    public function mutateSelectedColumns()
    {

        if ($this->groupByFields()) {
            return array_merge($this->selectedColumns(), $this->additionalSelectedColumnsDueToGroupBy());
        }

        return $this->selectedColumns();
    }

    /*
    |--------------------------------------------------------------------------
    | Alias columns
    |--------------------------------------------------------------------------
    |
    | These columns have one-to-one map with selected columns. Aliases are used
    | for using readable headers for raw table column names.
    |
    */

    /**
     * This function returns an array of Titles/Column aliases that are mapped with
     * each $selectedColumns. This usually comes from the inputs as CSV.
     * If no input found then this arrays is constructed based on $selectedColumns.
     *
     * @return array
     */
    public function aliasColumns()
    {
        // Use input value if available
        if (request('alias_columns_csv')) {
            $keys = Convert::csvToArray(request('alias_columns_csv'));
        } else { // Else, copy all the selected column values for alias.
            $keys = $this->selectedColumns();
        }

        // If number of alias is less than selected columns then fill the rest
        // from the selected columns.
        if (count($keys) <= count($this->selectedColumns())) {
            $keys = $this->fillAliasColumns($keys);
        }

        // If alias count is more than selection then trim
        if (count($keys) > count($this->selectedColumns())) {
            $keys = array_slice($keys, count($this->selectedColumns()));
        }

        return $keys;
    }

    /**
     * Change alias column array for output
     *
     * @return array
     */
    public function mutateAliasColumns()
    {

        if ($this->groupByFields()) {
            return array_merge($this->aliasColumns(), $this->additionalAliasColumnsDueToGroupBy());
        }

        return $this->aliasColumns();
    }

    /**
     * Fill the missing alias based on selected columns. Try to make the alias as
     * much human readable as possible.
     *
     * @param $keys
     * @return array
     */
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