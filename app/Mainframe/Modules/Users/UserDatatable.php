<?php
/** @noinspection UnknownInspectionInspection */
/** @noinspection DuplicatedCode */
/** @noinspection SenselessMethodDuplicationInspection */

namespace App\Mainframe\Modules\Users;

use App\Group;
use App\Mainframe\Features\Datatable\ModuleDatatable;

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
            [$this->table.".is_active", 'is_active', 'Active']
        ];
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
        $dt = $dt->rawColumns(['id', 'email', 'is_active']);

        // Next modify each column content
        /*  @var $dt \Yajra\DataTables\DataTableAbstract */
        $dt = $dt->editColumn('email', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$email}}</a>');
        $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$id}}</a>');
        $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');

        // Show group name
        $dt = $dt->editColumn('group_ids', function ($row) {

            $groupNames = Group::whereIn('id', json_decode($row->group_ids))
                ->remember(timer('very-long'))
                ->pluck('title')
                ->toArray();

            return implode(',', $groupNames);

        });

        return $dt;
    }

}