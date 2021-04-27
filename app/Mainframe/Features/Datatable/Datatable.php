<?php

namespace App\Mainframe\Features\Datatable;

use App\Mainframe\Features\Datatable\Traits\DatatableTrait;
use App\Module;

class Datatable
{
    use DatatableTrait;

    /** @var string */
    public $table;

    /** @var Module */
    public $module;

    /** @var \Yajra\DataTables\DataTableAbstract */
    public $dt;

    /**
     * List of columns that is allowed for search/sort.
     *
     * @var array
     */
    public $whiteList = [];

    /**
     * List of columns that is not allowed for search/sort.
     *
     * @var array
     */
    public $blackList = [];

    /**
     * Set columns that should not be escaped. (HTML)
     * Optionally merge the defaults from config.
     *
     * @var string[]
     */
    public $rawColumns = ['id', 'name', 'is_active'];

    /**
     * Data source URL
     *
     * @var string
     */
    public $ajaxUrl;

    /**
     * Constructor for this class is very important as it boots up necessary features of
     * a module. First of all, it load module related meta information, then based
     * on context check(tenant context) it loads the tenant id. The it constructs the default
     * grid query and also add tenant context to grid query if applicable. Finally it
     * globally shares a couple of variables $name, $currentModule to all views rendered
     * from this controller
     *
     * @param $table
     */
    public function __construct($table = null)
    {
        $this->table = $table ?: $this->table;
    }

    /**
     * @param  \App\Module  $module
     * @return $this
     */
    public function setModule($module)
    {
        $this->module = $module;
        $this->table = $this->module->tableName();

        return $this;
    }

    /**
     * @param  string  $table
     * @return $this
     */
    public function setTable(string $table)
    {
        $this->table = $table;

        return $this;
    }

    /**
     * @param  string  $ajaxUrl
     * @return $this
     */
    public function setAjaxUrl(string $ajaxUrl)
    {
        $this->ajaxUrl = $ajaxUrl;

        return $this;
    }

    public function ajaxUrl()
    {
        if ($this->ajaxUrl) {
            return $this->ajaxUrl;
        }

        // Get custom data table URL
        return route('datatable.json', classKey($this));
    }

}