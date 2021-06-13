<?php

namespace App\Mainframe\Modules\Users\Traits;

use App\Group;

trait UserDatatableTrait
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
        $dt = parent::modify($dt);
        // Set columns for HTML output.
        $dt->rawColumns(['id', 'email', 'is_active']);

        // Next modify each column content
        if ($this->hasColumn('email')) {
            $dt->editColumn('email', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$email}}</a>');
        }

        // Show group name
        if ($this->hasColumn('email')) {
            $dt->editColumn('group_ids', function ($row) {
                $groupNames = Group::whereIn('id', $row->group_ids)
                    ->remember(timer('very-long'))
                    ->pluck('title')
                    ->toArray();

                return implode(',', $groupNames);
            });
        }

        return $dt;
    }
}