<?php

namespace App\Mainframe\Modules\InAppNotifications\Traits;

trait InAppNotificationDatatableTrait
{

    // /**
    //  * Note: Define Query Source
    //  *
    //  * @return \Illuminate\Database\Query\Builder|static
    //  */
    // public function source()
    // {
    //     return DB::table($this->table)->leftJoin('users as updater', 'updater.id', $this->table.'.updated_by');
    // }

    /**
     * Select columns, alias and corresponding HTML title
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
            [$this->table.'.is_active', 'is_active', 'Active'],
        ];
    }

    // /**
    //  * Note: Apply filter on query.
    //  *
    //  * @param $query \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder|mixed
    //  * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder|mixed
    //  */
    // public function filter($query)
    // {
    //     // if (request('id')) { // Example code
    //     //     $query->where('id', request('id'));
    //     // }
    //
    //     return $query;
    // }

    /**
     * Note: Modify datatable values
     *
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    // public function modify($dt)
    // {
    //     $dt = parent::modify($dt);
    //
    //     if ($this->hasColumn('column_name')) {
    //         $dt->editColumn('column_name', function ($row) {
    //             return $row->column_name.'updated';
    //         });
    //     }
    //
    //     return $dt;
    // }
}