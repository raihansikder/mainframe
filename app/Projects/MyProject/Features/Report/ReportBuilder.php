<?php

namespace App\Projects\MyProject\Features\Report;

use App\Mainframe\Features\Report\Traits\Columns;
use App\Mainframe\Features\Report\Traits\Filterable;
use App\Mainframe\Features\Report\Traits\Output;
use App\Mainframe\Features\Report\Traits\Query;
use App\Mainframe\Http\Controllers\BaseController;
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
    /** @var  \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Model DB Table/View names */
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
    public $path = 'projects.my-project.layouts.report';

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

    /*
    |--------------------------------------------------------------------------
    | User executing the report
    |--------------------------------------------------------------------------
    |
    */
    /** @var \App\User */
    public $user;

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

    // public function queryDataSource() { }
    // public function defaultFilterEscapeFields() { }
    // public function customFilterOnEscapedFields($query, $field, $val) { }
    // public function columnOptions() { }
    // public function ghostColumnOptions() { }
    // public function defaultColumns() { }

    /*
    |--------------------------------------------------------------------------
    | Group by Configurations
    |--------------------------------------------------------------------------
    */
    // public function queryAddColumnForGroupBy($keys = []) { }
    // public function additionalSelectedColumnsDueToGroupBy() { }
    // public function additionalAliasColumnsDueToGroupBy() { }
}