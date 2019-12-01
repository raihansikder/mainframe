<?php

namespace App\Mainframe\Features\Report;

use Cache;
use Schema;
use App\Mainframe\Modules\Modules\Module;

class ModuleReportBuilder extends ReportBuilder
{
    public $module;
    public $model;

    public function __construct(Module $module, $dataSource = null, $baseDir = null, $cache = 0)
    {

        $this->module = $module;
        $this->model = $this->module->modelInstance();

        parent::__construct($dataSource, $baseDir, $cache);
    }

    /**
     * Query select table
     *
     * @return \Illuminate\Database\Query\Builder||\Illuminate\Database\Eloquent\Builder
     */
    public function selectDataSource()
    {

        if (request('with')) {
            return $this->model->with(explode(',', request('with')));
        }

        return $this->model;
    }

    /**
     * Get the data source field|columns names
     *
     * @return mixed|null
     */
    public function dataSourceColumns()
    {
        return Cache::remember('columns-of:'.$this->module->tableName(), cacheTime('very-long'), function () {
            return Schema::getColumnListing($this->module->tableName());
        });
    }

    /**
     * @param $query   \Illuminate\Database\Query\Builder
     * @return mixed
     */
    // public function filters($query)
    // {
    //     /** @var array $escape_fields */
    //     $escape_fields = []; // Default filter logic will not apply on these
    //
    //     $requests = request()->all();
    //     foreach ($requests as $name => $val) {
    //         if (in_array($name, $escape_fields)) {
    //             // Process custom filters test1,test2,test3
    //         } else {
    //             $query = $this->defaultFilter($query, $name, $val);
    //         }
    //     }
    //
    //     if ($this->additionalFilterConditions()) {
    //         $query = $query->whereRaw($query, $this->additionalFilterConditions());
    //     }
    //
    //     $query = $query->whereNull('deleted_at');
    //
    //     return $query;
    // }

}