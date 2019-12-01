<?php

namespace App\Mainframe\Features\Report;

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
    public function __construct($dataSource = null, $baseDir = null, $cache = null)
    {
        parent::__construct();

        $this->dataSource = $dataSource;
        $this->baseDir = $baseDir ?: 'mainframe.layouts.report';
        $this->cache = $cache ?: 1000;
    }

}