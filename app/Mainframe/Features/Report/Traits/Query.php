<?php

namespace App\Mainframe\Features\Report\Traits;

use DB;
use Illuminate\Database\Query\Builder;

/** @mixin \App\Mainframe\Features\Report\ReportBuilder $this */
trait Query
{
    /**
     * Query to initially select table or a model.
     *
     * @return \Illuminate\Database\Query\Builder|string|\Illuminate\Database\Eloquent\Model
     */
    public function queryDataSource()
    {
        if (is_string($this->dataSource)) {
            return DB::table($this->dataSource);
        }

        return $this->dataSource;
    }

    /**
     * Convert input csv to array
     *
     * @return array
     */
    public function querySelectColumns()
    {

        if (count($this->selectedColumns())) {
            $keys = $this->selectedColumns();
            $keys = $this->includeDefaultSelectedColumns($keys);
            $keys = $this->excludeSelectedGhostColumns($keys);

        } else {
            $keys = $this->dataSourceColumns();
        }

        $keys = $this->queryAddColumnForGroupBy($keys);

        return $keys;
    }

    /**
     * Add the columns that should be always selected.
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
            if (! in_array($key, $this->ghostSelectColumns())) {
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
     * Determine the group by field field names. Usually this is input
     * from the report generator form.
     *
     * @return array
     */
    public function groupByFields()
    {
        return $this->csvToArray(request('group_by'));
    }

    /**
     * @return array|bool
     */
    public function hasGroupBy()
    {
        return $this->groupByFields() ?: false;
    }

    /**
     * Add groupBy clause to the query builder.
     *
     * @param $query Builder
     * @return \Illuminate\Database\Query\Builder
     */
    public function groupBy($query)
    {
        $group_bys = $this->groupByFields();
        if ($group_bys) {
            $query = $query->groupBy($group_bys);
        }

        return $query;
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
        $query = $this->groupBy($query);
        $query = $this->orderBy($query);

        return $query;
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
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Support\Collection
     */
    public function result()
    {
        // return Cache::remember(md5($this->resultQuery()->toSql()), $this->cache, function () {
        // });

        return $this->resultQuery()->paginate($this->rowsPerPage());

    }

    /**
     * Get total number of rows
     *
     * @return int
     */
    public function total()
    {
        return $this->totalQuery()->count();
    }

    public function totalQuery()
    {
        $query = $this->queryDataSource();
        $query = $this->filter($query);

        return $query;
    }

    /**
     * Check if the response expects full data
     *
     * @return bool
     */
    public function expectsAllData()
    {
        if (in_array($this->output(), ['excel', 'print'])) {
            return true;
        }
        if (request('force_all_data') == 'true') {
            return true;
        }

        return false;
    }
}