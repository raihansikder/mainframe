<?php
/** @noinspection UnknownInspectionInspection */

/** @noinspection DuplicatedCode */

namespace App\Mainframe\Features\Datatable;

use DB;
use App\Mainframe\Modules\Modules\Module;

class Datatable
{

    /** @var string */
    public $moduleName;
    /** @var \App\Mainframe\Modules\Modules\Module */
    public $module;
    /** @var string */
    public $table;

    /**
     * Constructor for this class is very important as it boots up necessary features of
     * Spyr module. First of all, it load module related meta information, then based
     * on context check(tenant context) it loads the tenant id. The it constructs the default
     * grid query and also add tenant context to grid query if applicable. Finally it
     * globally shares a couple of variables $moduleName, $currentModule to all views rendered
     * from this controller
     *
     * @param $moduleName
     */
    public function __construct($moduleName)
    {
        $this->moduleName = $moduleName;
        $this->module = Module::byName($moduleName);
        $this->table = $this->module->tableName();
    }

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function source()
    {
        return DB::table($this->table)
            ->leftJoin('users as updater', $this->table.'.updated_by', 'updater.id');
    }

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            [$this->table.".id", 'id', 'ID'],
            [$this->table.".name", 'name', 'Name'],
            ['updater.name', 'user_name', 'Updater'],
            [$this->table.".updated_at", 'updated_at', 'Updated at'],
            [$this->table.".is_active", 'is_active', 'Active']
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

        // Inject tenant context in grid query
        if ($tenant_id = inTenantContext($this->table)) {
            $query = injectTenantIdInModelQuery($this->table, $query);
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
        $dt = $dt->rawColumns(['id', 'name', 'is_active']);

        // Next modify each column content
        /*  @var $dt \Yajra\DataTables\DataTableAbstract */
        $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->moduleName.'.edit\', $id) }}">{{$name}}</a>');
        $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->moduleName.'.edit\', $id) }}">{{$id}}</a>');
        $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');

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
        /** @var \Yajra\DataTables\DataTableAbstract $dt */
        return ($this->modify(datatables($this->query())))->toJson();
    }

}