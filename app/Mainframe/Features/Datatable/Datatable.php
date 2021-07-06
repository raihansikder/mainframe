<?php

namespace App\Mainframe\Features\Datatable;

use App\Mainframe\Features\Datatable\Traits\DatatableTrait;
use App\Module;
use Illuminate\Database\Eloquent\Model;

class Datatable
{
    use DatatableTrait;

    /** @var string */
    public $name;

    /** @var string */
    public $table;

    /** @var Module */
    public $module;

    /** @var Model */
    public $model;

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
     * @deprecated Automatically all columns are considered as raw(html) columns
     */
    public $rawColumns = ['tenant_sl', 'id', 'name', 'is_active', 'action'];

    /**
     * Data source URL
     *
     * @var string
     */
    public $ajaxUrl;

    public $pageLength = 50;

    public $hidden;

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
     * @param  \App\Module|string  $module
     * @return Datatable|bool
     */
    public function setModule($module)
    {
        if (is_string($module)) {
            $module = Module::byName($module);
        }

        if (!$module) {
            return false;
        }

        $this->module = $module;
        $this->table = $this->module->tableName();
        $this->model = $this->module->modelInstance();

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

    /**
     * Ajax URL for json source
     *
     * @return string
     */
    public function ajaxUrl()
    {
        if (!$this->ajaxUrl) {
            $this->ajaxUrl = route('datatable.json', classKey($this)); // Default common route for dynamic datatables
        }

        // Pass the current request params to datatable
        return urlWithParams($this->ajaxUrl, parse_url(\URL::full(), PHP_URL_QUERY));
    }

    /**
     * Datatable page length
     *
     * @return int
     */
    public function pageLength()
    {
        return $this->pageLength ?? 50;
    }

    public function hidden()
    {
        return $this->hidden ?? [];
    }

}