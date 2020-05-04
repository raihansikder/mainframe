<?php
/** @noinspection UnknownInspectionInspection */

/** @noinspection DuplicatedCode */

namespace App\Mainframe\Features\Datatable;

use DB;

class Datatable
{

    /** @var string */
    public $table;

    /** @var \Yajra\DataTables\DataTableAbstract */
    public $dt;

    /** @var array */
    public $whiteList = [];

    /** @var array */
    public $blackList = [];

    /** @var array */
    public $rawColumns = ['id', 'name', 'is_active'];

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
    public function __construct($table)
    {
        $this->table = $table;
    }

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function source()
    {
        return DB::table($this->table)
            ->leftJoin('users as updater', 'updater.id', $this->table.'.updated_by');
    }

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            [$this->table.'.id', 'id', 'ID'],
            [$this->table.'.name', 'name', 'Name'],
            ['updater.name', 'user_name', 'Updater'],
            [$this->table.'.updated_at', 'updated_at', 'Updated at'],
            [$this->table.'.is_active', 'is_active', 'Active']
        ];
    }

    /**
     * Construct SELECT statement (field1 AS f1, field2 as f2...)
     *
     * @return array
     */
    public function selects()
    {
        $cols = [];
        foreach ($this->columns() as $col) {
            $cols[] = $col[0].' as '.$col[1];
        }

        return $cols;
    }

    /**
     * Define Query for generating results for grid
     *
     * @return $this|mixed
     */
    public function query()
    {
        $query = $this->source()->select($this->selects());

        // Inject tenant context.
        // If the query source is a DB::table() you have to inject tenant context manually.
        // Else, if the source is a model then tenant_id checking is injected automatically.
        if (user()->ofTenant() && \Schema::hasColumn($this->table, 'tenant_id')) {
            $query->where('tenant_id', user()->tenant_id);
        }

        // Exclude deleted rows
        $query = $query->whereNull($this->table.'.deleted_at'); // Skip deleted rows

        return $query;
    }

    /**
     * Modify datatable values
     *
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    public function modify($dt)
    {
        // Set columns for HTML output.
        // $dt = $dt->rawColumns($this->rawColumns);

        // // Next modify each column content
        // /*  @var $dt \Yajra\DataTables\DataTableAbstract */
        // if ($this->hasColumn('name')) {
        //     // $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$name}}</a>');
        //     $dt = $dt->editColumn('name', function ($row) {
        //         return '<a href="'.route($this->module->name.'.edit', $row->id).'">'.$row->name.'</a>';
        //     });
        // }
        // if ($this->hasColumn('id')) {
        //     $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$id}}</a>');
        // }
        //
        // if ($this->hasColumn('is_active')) {
        //     $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');
        // }
        return $dt;
    }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     *
     * @return \Illuminate\Http\JsonResponse
     * @var \Yajra\DataTables\DataTables $dt
     */
    public function json()
    {
        $dt = datatables($this->query());

        // HTML Output
        $dt->rawColumns($this->rawColumns);

        if (count($this->whiteList)) {
            $dt->whitelist($this->whiteList);
        }

        if (count($this->blackList)) {
            $dt->blacklist($this->blackList);
        }

        return $this->modify($dt)->toJson();
    }

    /**
     * Instantiate data table.
     *
     * @return $this
     */
    public function datatable()
    {
        $this->dt = datatables($this->query());

        return $this;
    }

    /**
     * Check if a column exists in the data table
     *
     * @param $column
     * @return bool
     */
    public function hasColumn($column)
    {
        foreach ($this->columns() as $col) {
            if ($col[1] == $column) {
                return true;
            }
        }

        return false;
    }
}