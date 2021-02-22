<?php

namespace App\Mainframe\Features\Datatable\Traits;

trait ModuleDatatableTrait
{
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

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function query()
    {
        $query = $this->source()->select($this->selects());

        // Inject tenant context.
        if (user()->ofTenant() && $this->module->tenantEnabled()) {
            $query->where($this->module->tableName().'.tenant_id', user()->tenant_id);
        }

        // Exclude deleted rows
        $query->whereNull($this->table.'.deleted_at');

        return $this->filter($query);
    }

    /**
     * Modify datatable row values
     *
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    public function modify($dt)
    {
        if ($this->hasColumn('name')) {
            // $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$name}}</a>');
            $dt = $dt->editColumn('name', function ($row) {
                return '<a href="'.route($this->module->name.'.edit', $row->id).'">'.$row->name.'</a>';
            });
        }

        if ($this->hasColumn('id')) {
            $dt = $dt->editColumn('id', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$id}}</a>');
        }

        if ($this->hasColumn('is_active')) {
            $dt = $dt->editColumn('is_active', '@if($is_active) Yes @else <span class="text-red">No</span> @endif');
        }

        if ($this->hasColumn('updated_at')) {
            $dt = $dt->editColumn('updated_at', function ($row) {
                return formatDateTime($row->updated_at);
            });
        }

        return $dt;
    }

    /**
     * API url
     *
     * @return mixed
     */
    public function ajaxUrl()
    {
        if ($this->ajaxUrl) {
            return $this->ajaxUrl;
        }

        $this->ajaxUrl = route($this->module->name.'.datatable-json').'?'.parse_url(\URL::full(), PHP_URL_QUERY);

        return $this->ajaxUrl;
    }
}