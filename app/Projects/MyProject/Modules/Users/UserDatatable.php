<?php
/** @noinspection UnknownInspectionInspection */
/** @noinspection DuplicatedCode */
/** @noinspection SenselessMethodDuplicationInspection */

namespace App\Projects\MyProject\Modules\Users;

use App\Group;
use App\Mainframe\Features\Datatable\ModuleDatatable;
use Schema;

class UserDatatable extends ModuleDatatable
{

    /**
     * Define grid SELECT statement and HTML column name.
     *
     * @return array
     */
    public function columns()
    {
        return [
            [$this->table.".id", 'id', 'ID'],
            [$this->table.".email", 'email', 'Email'],
            [$this->table.".group_ids", 'group_ids', 'Groups'],
            ['updater.name', 'user_name', 'Updater'],
            [$this->table.".updated_at", 'updated_at', 'Updated at'],
            [$this->table.".is_active", 'is_active', 'Active'],
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

        // Inject tenant context.
        if (user()->ofTenant() && Schema::hasColumn($this->table, 'tenant_id')) {
            $query->where('users.tenant_id', user()->tenant_id);
        }

        // Exclude deleted rows
        $query->whereNull($this->table.'.deleted_at'); // Skip deleted rows

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
        $dt = $dt->rawColumns(['id', 'email', 'is_active']);

        $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$id}}</a>');
        $dt = $dt->editColumn('email', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$email}}</a>');
        $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');

        // Show group name
        $dt = $dt->editColumn('group_ids', function ($row) {

            $groupNames = Group::whereIn('id', json_decode($row->group_ids))
                ->remember(timer('very-long'))
                ->pluck('title')
                ->toArray();

            return implode(',', $groupNames);

        });
        if ($this->hasColumn('updated_at')) {
            $dt = $dt->editColumn('updated_at', function ($row) {
                return formatDateTime($row->updated_at);
            });
        }

        return $dt;
    }

}