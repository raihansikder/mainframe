<?php

namespace App\Mainframe\Features\Report;

use App\Mainframe\Features\Report\Traits\Columns;
use App\Mainframe\Features\Report\Traits\Filterable;
use App\Mainframe\Features\Report\Traits\Output;
use App\Mainframe\Features\Report\Traits\Query;
use App\Mainframe\Http\Controllers\BaseController;
use DB;
use Illuminate\Database\Query\Builder;

class ReportBuilder extends BaseController
{

    use Filterable, Columns, Query, Output;

    /*
    |--------------------------------------------------------------------------
    | Data Source
    |--------------------------------------------------------------------------
    |
    | Source of data. This can be a string that represents a table or SQL view
    | Or, this can be a model name.
    |
    */
    /** @var  \Illuminate\Database\Query\Builder|string|\Illuminate\Database\Eloquent\Model DB Table/View names */
    public $dataSource;

    /*
    |--------------------------------------------------------------------------
    | Base Directory for view/blade
    |--------------------------------------------------------------------------
    |
    | All view files of a report is stored under a single directory.
    |
    */
    /** @var  string Directory location of the report blade templates */
    public $path = 'mainframe.layouts.report';

    /*
    |--------------------------------------------------------------------------
    | Query cache time
    |--------------------------------------------------------------------------
    |
    | How long the report result is cached
    |
    */
    /** @var int Cache time */
    public $cache = 1;

    /*
    |--------------------------------------------------------------------------
    | Query for getting report result
    |--------------------------------------------------------------------------
    |
    | How long the report result is cached
    |
    */
    /** @var  Builder */
    public $query;

    /*
    |--------------------------------------------------------------------------
    | results
    |--------------------------------------------------------------------------
    |
    | How long the report result is cached
    |
    */
    /** @var  \Illuminate\Support\Collection Report result */
    public $result;

    /*
    |--------------------------------------------------------------------------
    | full text fields
    |--------------------------------------------------------------------------
    |
    | Uses SQL Like % %
    |
    */
    /** @var array */
    public $fullTextFields = ['name', 'name_ext'];

    /*
    |--------------------------------------------------------------------------
    | Common key based search fields
    |--------------------------------------------------------------------------
    |
    | Uses SQL Like % %
    |
    */
    /** @var array */
    public $searchFields = ['name', 'name_ext'];

    /*
    |--------------------------------------------------------------------------
    | Output file name
    |--------------------------------------------------------------------------
    |
    | How long the report result is cached
    |
    */
    /** @var string */
    public $fileName;

    /**
     * ReportBuilder constructor.
     *
     * @param  string  $dataSource
     * @param  string  $path
     * @param  int  $cache
     */
    public function __construct($dataSource = null, $path = null, $cache = null)
    {
        parent::__construct();
        $this->transformRequest();

        $this->dataSource = $dataSource ?: $this->dataSource;
        $this->path = $path ?: $this->path;
        $this->cache = $cache ?: $this->cache;
    }

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
     * Some filters needs to escaped from default handling and used for custom query
     * generation.
     *
     * @return array
     */
    public function defaultFilterEscapeFields()
    {
        return [];
    }

    /**
     * Custom query for escaped filter fields.
     *
     * @param $query \Illuminate\Database\Query\Builder
     * @param $field
     * @param $val
     * @return mixed
     */
    public function customFilterOnEscapedFields($query, $field, $val)
    {
        // if($field == 'some_name'){
        //     $query = $query->where($field,strtok($val));
        // }
        return $query;
    }

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
     * Columns that should be always included in the select column query.
     * Usually this is id field. This is useful to generate a url
     * to the linked element.
     *
     * @return array
     */
    public function defaultSelectedColumns()
    {
        return ['id', 'name'];
    }


    /*
    |--------------------------------------------------------------------------
    | Group by Configurations
    |--------------------------------------------------------------------------
    |
    | Functions to tweak 'Group By' handling.
    |
    */
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

}