<?php

namespace App\Mainframe\Features\Report;

use DB;
use Illuminate\Database\Query\Builder;
use App\Mainframe\Features\Report\Traits\Query;
use App\Mainframe\Features\Report\Traits\Output;
use App\Mainframe\Features\Report\Traits\Columns;
use App\Mainframe\Features\Report\Traits\Filterable;
use App\Mainframe\Features\Modular\BaseController\MainframeBaseController;

class ReportBuilder extends MainframeBaseController
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
    public $baseDir;

    /*
    |--------------------------------------------------------------------------
    | Query cache time
    |--------------------------------------------------------------------------
    |
    | How long the report result is cached
    |
    */
    /** @var int Cache time */
    public $cache;

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

    /**
     * ReportBuilder constructor.
     *
     * @param  string  $dataSource
     * @param  string  $baseDir
     * @param  int  $cache
     */
    public function __construct($dataSource = null, $baseDir = null, $cache = 0)
    {
        parent::__construct();

        $this->dataSource = $dataSource;
        $this->baseDir = $baseDir ?: 'mainframe.layouts.report';
        $this->cache = $cache ?: 1000;
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

}