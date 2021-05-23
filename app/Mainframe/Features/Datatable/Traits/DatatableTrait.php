<?php

namespace App\Mainframe\Features\Datatable\Traits;

use App\Mainframe\Features\Datatable\Datatable;

/** @mixin Datatable */
trait DatatableTrait
{
    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function source()
    {
        return \DB::table($this->table)
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
            [$this->table.'.is_active', 'is_active', 'Active'],
        ];
    }

    /**
     * Construct SELECT statement (field1 AS f1, field2 as f2...)
     *
     * @return array
     */
    public function selects()
    {
        $columns = $this->columns();

        // Note: Modify the $columns as you need.

        return $this->selectQueryString($columns);
    }

    /**
     * Create a sql query string
     *
     * @param $columns
     * @return array
     */
    public function selectQueryString($columns)
    {
        $selects = [];
        foreach ($columns as $col) {
            $selects[] = $col[0].' as '.$col[1]; // user.name as name
        }

        return $selects;
    }

    /**
     * Define Query for generating results for grid
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function query()
    {
        $query = $this->source()->select($this->selects());

        // Exclude deleted rows
        $query = $query->whereNull($this->table.'.deleted_at');

        return $this->filter($query);
    }

    /**
     * Apply filter on query.
     *
     * @param $query \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder|mixed
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder|mixed
     */
    public function filter($query)
    {
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
        // if ($this->hasColumn('name')) {
        //     // $dt = $dt->editColumn('name', '<a href="{{ route(\''.$this->module->name.'.edit\', $id) }}">{{$name}}</a>');
        //     $dt = $dt->editColumn('name', function ($row) {
        //         return '<a href="'.route($this->module->name.'.edit', $row->id).'">'.$row->name.'</a>';
        //     });
        // }

        return $dt;
    }

    public function process()
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
        $dt = $this->process();

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

    /**
     * Titles extracted from the column definition
     *
     * @return array
     * @noinspection PhpUnusedParameterInspection
     */
    public function titles()
    {
        return collect($this->columns())->map(function ($item, $key) {
            // Take 3rd index. Check datatable class select()
            return $item[2];
        })->all();
    }

    /**
     * Json value for Javascript dataTable.ajax
     * { data: 'id', name: 'settings.id' },{ data: 'name', name: 'settings.name' },...
     *
     * @return mixed
     */
    public function columnsJson()
    {
        return collect($this->columns())->reduce(function ($carry, $item) {
            return $carry."{ data: '".$item[1]."', name: '".$item[0]."' },";
        });
    }

    /**
     * API url
     *
     * @return mixed
     */
    public function ajaxUrl()
    {
        $url = $this->ajaxUrl;

        // Note: Use full URL to generate filtered search result
        return $url.'?'.parse_url(\URL::full(), PHP_URL_QUERY);
    }

    /**
     * Datatable unique identifier
     *
     * @return string|null
     */
    public function identifier()
    {

        if ($this->module) {
            return \Str::camel($this->module->name.'Dt');
        }

        if ($this->table) {
            return \Str::camel($this->table.'Dt');
        }

        return \Str::camel(class_basename($this).'Dt');

    }

    /**
     * The name should be CamelCase
     *
     * @return string
     */
    public function name()
    {
        if ($this->name) {
            return \Str::camel($this->name);
        }

        return \Str::camel($this->identifier());
    }

}