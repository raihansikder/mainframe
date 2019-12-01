<?php

namespace App\Mainframe\Features\Report;

use DB;
use App\Mainframe\Modules\Modules\Module;

class ModuleReportBuilder extends ReportBuilder
{
    public $module;

    public function __construct(Module $module, $dataSource = null, $baseDir = null, $cache = 0)
    {
        parent::__construct($dataSource, $baseDir, $cache);
        $this->module = $module;
    }

    /**
     * Query select table
     *
     * @return \Illuminate\Database\Query\Builder||\Illuminate\Database\Eloquent\Builder
     */
    public function selectDataSource()
    {
        if ($this->dataSource()) {
            return DB::table($this->dataSource());
        }

        if (request('with')) {
            return $this->module->modelInstance()->with(explode(',', request('with')));
        }

        return $this->module->modelInstance();
    }

    /**
     * @param $query   \Illuminate\Database\Query\Builder
     * @return mixed
     */
    public function filters($query)
    {
        /** @var array $escape_fields */
        $escape_fields = []; // Default filter logic will not apply on these

        $requests = request()->all();
        foreach ($requests as $name => $val) {
            if (in_array($name, $escape_fields)) {
                // Process custom filters test1,test2,test3
            } else {
                $query = $this->defaultFilter($query, $name, $val);
            }
        }

        if ($this->additionalFilterConditions()) {
            $query = $query->whereRaw($query, $this->additionalFilterConditions());
        }

        $query = $query->whereNull('deleted_at');

        return $query;
    }

}