<?php

namespace App\Mainframe\Features\Report\Traits;

use DB;
use Cache;
use App\Mainframe\Helpers\Mf;
use Illuminate\Database\Query\Builder;
use App\Mainframe\Helpers\Convert;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder $this */
trait Query
{
    /**
     * Build query to get the data.
     *
     * @return \Illuminate\Database\Query\Builder
     */
    public function resultQuery()
    {
        /** @var Builder $query */
        $query = $this->queryDataSource();
        if (count($this->querySelectColumns())) {
            $query = $query->select($this->querySelectColumns());
        }
        $query = $this->filter($query);

        // Inject tenant context.
        if(user()->ofTenant() && $this->hasTenantContext()){
            $query->where('tenant_id',user()->tenant_id);
        }

        $query = $this->groupBy($query);
        $query = $this->orderBy($query);

        return $query;
    }

    /**
     * Check if data source has tenant field
     * @return bool
     */
    public function hasTenantContext()
    {
        return $this->fieldExists('tenant_id');
    }

    /**
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public function result()
    {

        $key = Mf::httpRequestSignature(($this->resultQuery()->toSql()));

        return Cache::remember($key, $this->cache, function () {
            return $this->resultQuery()->paginate($this->rowsPerPage());
        });

    }

    /**
     * Rows per page. If grouped then show all rows.
     *
     * @return mixed
     */
    public function rowsPerPage()
    {
        // For groupBy query show all in one page
        if ($this->hasGroupBy() || $this->expectsAllData()) {
            return $this->total();
        }

        return request('rows_per_page') ?: 20;
    }

    /**
     * Get total number of rows
     *
     * @return int
     */
    public function total()
    {
        $key = Mf::httpRequestSignature(($this->totalQuery()->toSql()));

        return Cache::remember($key, $this->cache, function () {
            return $this->totalQuery()->count();
        });

    }

    /**
     * Query to get total number of rows
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed|string
     */
    public function totalQuery()
    {
        $query = $this->queryDataSource();
        $query = $this->filter($query);

        return $query;
    }

    /*
    |--------------------------------------------------------------------------
    | Build query
    |--------------------------------------------------------------------------
    |
    | Below is a step-by-step query building process broken down into  all
    | possible units. Functions are used instead of variables to define
    | some of the configuration so that logic an be applied inside
    | the function if needed.
    |
    */

    /**
     * Query to initially select table or a model.
     *
     * @return \Illuminate\Database\Query\Builder|string|\Illuminate\Database\Eloquent\Model
     */
    public function queryDataSource()
    {
        // Source is a table
        if (is_string($this->dataSource)) {
            return DB::table($this->dataSource);
        }

        // Source is a model/collection
        return $this->dataSource;
    }

    /**
     * Construct the SQL SELECTS for the final query.
     *
     * @return array
     */
    public function querySelectColumns()
    {

        $keys = $this->selectedColumns();                    // Manually selected columns, Default all if none selected.
        $keys = $this->includeDefaultSelectedColumns($keys); // Default selected columns behind the scene
        $keys = $this->excludeSelectedGhostColumns($keys);   // Exclude any column name that does not actually exists
        $keys = $this->queryAddColumnForGroupBy($keys);

        return $keys;
    }

    /**
     * Add the columns that should be always included in query.
     *
     * @param  array  $keys
     * @return array
     */
    public function includeDefaultSelectedColumns($keys = [])
    {
        foreach ($this->defaultSelectedColumns() as $col) {
            if (! in_array($col, $keys) && in_array($col, $this->dataSourceColumns())) {
                $keys[] = $col;
            }
        }

        return $keys;
    }

    /**
     * Columns that should be always included in the select column query.
     * Usually this is id field. This is useful to generate a url
     * to the linked element.
     *
     * @return array
     */
    public function defaultSelectedColumns()
    {
        return ['id'];
    }

    /**
     * Remove ghost columns from the array of select columns.
     *
     * @param  array  $keys
     * @return array
     */
    public function excludeSelectedGhostColumns($keys = [])
    {
        $temp = [];
        foreach ($keys as $key) {
            if (! in_array($key, $this->ghostColumnOptions())) {
                $temp[] = $key;
            }
        }

        return $temp;
    }

    /**
     * @param $query Builder
     * @return \Illuminate\Database\Query\Builder
     */
    public function orderBy($query)
    {
        if (request('order_by')) {
            $query = $query->orderByRaw(request('order_by'));
        }

        return $query;
    }

    /**
     * Add groupBy clause to the query builder.
     *
     * @param $query Builder
     * @return \Illuminate\Database\Query\Builder
     */
    public function groupBy($query)
    {
        if ($this->hasGroupBy()) {
            return $query->groupBy($this->groupByFields());
        }

        return $query;
    }

    /**
     * Determine the group by field field names. Usually this is input
     * from the report generator form.
     *
     * @return array
     */
    public function groupByFields()
    {
        return Convert::csvToArray(request('group_by'));
    }

    /**
     * @return array|bool
     */
    public function hasGroupBy()
    {
        return $this->groupByFields() ?: false;
    }

    /**
     * Adds the custom COUNT/SUM column in SQL SELECT.
     *
     * @param  array  $keys
     * @return array
     */
    public function queryAddColumnForGroupBy($keys = [])
    {
        if ($this->hasGroupBy()) {
            $keys[] = DB::raw('count(*) as total');
        }

        return $keys;
    }

    /**
     * Due to existence of a group by clause some additional column
     * needs to be shown. This function returns the array of those additional columns.
     *
     * @return array
     */
    public function additionalSelectedColumnsDueToGroupBy()
    {
        // considering COUNT(*) as total exists in the query builder. However this
        // doesn't always have to be total. For example it can be sum if there
        // query has SUM(*) as sum
        return ['total'];
        //$merge[] = 'sum';
    }

    /**
     * Due to existence of a group by clause some additional alias columns are required
     * this array maps with the additionalSelectedColumnsDueToGroupBy.
     * `@return array
     */
    public function additionalAliasColumnsDueToGroupBy()
    {
        // considering COUNT(*) as total exists in the query builder. However this
        // doesn't always have to be total. For example it can be sum if there
        // query has SUM(*) as sum
        return ['Total'];
        //$merge[] = 'sum';
    }

    /**
     * Check if the response expects full data
     *
     * @return bool
     */
    public function expectsAllData()
    {
        if (in_array($this->outputType(), ['excel', 'print'])) {
            return true;
        }
        if (request('force_all_data') == 'yes') {
            return true;
        }

        return false;
    }

    /**
     * Cache key generator
     * @return string
     */
    public function signature()
    {
        return Mf::httpRequestSignature(($this->resultQuery()->toSql()));
    }
}