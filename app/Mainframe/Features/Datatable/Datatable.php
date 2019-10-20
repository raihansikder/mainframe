<?php

namespace App\Mainframe\Features\Datatable;

use DB;
use App\Module;

class Datatable
{

    public $moduleName;        // Stores module name with lowercase and plural i.e. 'superheros'.
    public $module;            // Stores module name with lowercase and plural i.e. 'superheros'.

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
        $this->module     = Module::byName($moduleName);

    }

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|static
     */
    public function source()
    {
        return DB::table($this->moduleName)
            ->leftJoin('users as updater', $this->moduleName.'.updated_by', 'updater.id');
    }

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            ["{$this->moduleName}.id", "id", "ID"],
            ["{$this->moduleName}.name", "name", "Name"],
            ["updater.name", "user_name", "Updater"],
            ["{$this->moduleName}.updated_at", "updated_at", "Updated at"],
            ["{$this->moduleName}.is_active", "is_active", "Active"]
        ];
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
        if ($tenant_id = inTenantContext($this->moduleName)) {
            $query = injectTenantIdInModelQuery($this->moduleName, $query);
        }

        // Exclude deleted rows
        $query = $query->whereNull($this->moduleName.'.deleted_at'); // Skip deleted rows

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
        // First set columns for  HTML rendering
        $dt = $dt->rawColumns(['id', 'name', 'is_active']); // HTML can be printed for raw columns

        // Next modify each column content
        /*  @var $dt \Yajra\DataTables\DataTableAbstract */

        /** @var \App\Http\Mainframe\Controllers\ModuleBaseController $this */
        $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->moduleName.'.edit\', $id) }}">{{$name}}</a>');
        $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->moduleName.'.edit\', $id) }}">{{$id}}</a>');
        $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');

        return $dt;
    }

    /**
     * Construct SELECT statement based
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