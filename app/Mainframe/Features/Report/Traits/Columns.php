<?php

namespace App\Mainframe\Features\Report\Traits;

use App\Mainframe\Helpers\Convert;
use App\Mainframe\Helpers\Mf;
use Str;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder */
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
     * Some times we need to pass column names that do not exists directly in the source (model/table).
     * Such should be skipped in the query building. Value of these columns should be assigned
     * through mutateResult() function. This is useful to include custom fields in the report
     * User can also see these ghost columns in the column selection option in the advanced
     * report option.
     *
     * @return array
     */
    public function ghostColumns()
    {
        return [];
    }

    /**
     * Some times we need to pass column names that do not exists in the model/table.
     * This should not be considered in query building. Rather we want this to be
     * post processed in mutation function.
     *
     * @return array
     * @deprecated  use ghostColumns() instead
     */
    public function ghostColumnOptions()
    {
        return $this->ghostColumns();
    }

    /**
     * Get the data source field|columns names from SQL table/view
     *
     * @return mixed|null
     */
    public function dataSourceColumns()
    {
        if (is_string($this->dataSource)) {
            return Mf::tableColumns($this->dataSource);
        }

        if (isset($this->model)) {
            return $this->model->tableColumns();
        }

        return [];
    }

    /**
     * Check if a column is available in data-source
     *
     * @param $column
     * @return bool
     */
    public function hasColumn($column)
    {
        return in_array($column, $this->dataSourceColumns());
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
     * Selected column.
     *
     * @return array
     */
    public function selectedColumns()
    {
        # Check if the column names are available in request().
        if (request('columns_csv')) {
            return Convert::csvToArray(request('columns_csv'));
        }

        # Default selection
        // return ['id','name','updated_by','updated_at'];

        # Include all the data-source columns
        return $this->dataSourceColumns();
    }

    /**
     * Check if selected columns have a key
     *
     * @param $column
     * @return bool
     */
    public function selectedColumnsHas($column)
    {
        return in_array($column, $this->selectedColumns());
    }

    public function selectedColumnsHasAny($columns)
    {
        foreach ($columns as $column) {
            if ($this->selectedColumnsHas($column)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Change selectedColumns array before passing to the view file.
     * For complex group by you may need additional columns
     *
     * @return array
     */
    public function mutateSelectedColumns()
    {
        $columns = $this->selectedColumns();
        $columns = $this->removeDotFromColumns($columns);

        /*
         * ------------------------------
         *  Change the values of
         *------------------------------
         */
        if ($this->groupByFields()) {
            return array_merge($columns, $this->additionalSelectedColumnsDueToGroupBy());
        }

        return $columns;
    }

    /**
     * Remove dot from column name
     *
     * @param $columns
     * @return array
     */
    public function removeDotFromColumns($columns)
    {
        return collect($columns)->map(function ($item, $key) {
            return \Str::after($item, '.');
        })->toArray();
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
            $keys = array_slice($keys, 0, count($this->selectedColumns()));
        }

        $keys = $this->removeDotFromColumns($keys);

        return $keys;
    }

    /**
     * Change alias for specific columns
     *
     * @param $map
     * @param $array
     * @return mixed
     */
    public function setAliasForColumns($map, $array)
    {
        $columns = $this->removeDotFromColumns($this->selectedColumns());
        foreach ($map as $column => $alias) {
            $pos = array_search($column, $columns);
            if (isset($array[$pos])) {
                $array[$pos] = $alias;
            }
        }

        return $array;
    }

    /**
     * Change alias column array for output. Add additional columns when needed.
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
            $temp[] = $this->aliasFor($key);
        }

        return $temp;
    }

    /**
     * Get column title for a given key.
     *
     * @param $key
     * @return string
     */
    public function aliasFor($key)
    {
        return Str::title(str_replace('_', ' ', $key));
    }
}