<?php

namespace App\Mainframe\Features\Datatable;

use App\Mainframe\Features\Datatable\Traits\DatatableTrait;

class Datatable
{
    use DatatableTrait;

    /** @var string */
    public $table;

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

}