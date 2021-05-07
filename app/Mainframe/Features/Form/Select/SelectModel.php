<?php

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Helpers\Mf;
use App\Module;
use Illuminate\Support\Arr;

class SelectModel extends SelectArray
{
    public $nameField;
    public $valueField;
    public $table;
    public $model;
    public $query;
    public $showInactive;
    public $cache;

    /**
     * SelectModel constructor.
     *
     * @param  array  $var
     * @param  null  $element
     */
    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->nameField = $this->var['name_field'] ?? 'name';
        $this->valueField = $this->var['value_field'] ?? 'id';

        $this->table = $this->var['table'] ?? null; // Must have table
        $this->model = $this->var['model'] ?? null; // Must have table
        $this->query = $this->var['query'] ?? $this->getQuery(); // DB::table($this->table);
        $this->showInactive = $this->var['show_inactive'] ?? false;
        $this->cache = $this->var['cache'] ?? timer('none');

        $this->options = $this->options();
    }

    public function getQuery()
    {
        if (isset($this->var['model'])) {
            $model = $this->var['model'];
            if (is_string($model)) {
                return (new $model)::query();
            }

            return $model;
        }

        if (isset($this->var['table'])) {
            $table = $this->var['table'];
            // $model = '\\App\\'.ucfirst(str_singular(camel_case($table)));
            // if (is_string($model)) {
            //     return (new $model)::query();
            // }
            // return $model;

            return Module::fromTable($table)->modelInstance();
        }
    }

    /**
     * Select options
     *
     * @return array
     */
    public function options()
    {
        $query = $this->query->whereNull('deleted_at');
        if (!$this->showInactive) {
            $query->where('is_active', 1);
        }

        // Inject tenant context.
        if ($this->inTenantContext()) {
            $query->where('tenant_id', user()->tenant_id);
        }
        $options = $query->orderBy($this->nameField)
            ->pluck($this->nameField, $this->valueField)
            ->toArray();

        // $options[0] = null; // Zero fill empty selection
        // $options[null] = '-';  // Null fill empty selection

        return Arr::sort($options);
    }

    /**
     * Check if currently in tenant context.
     *
     * @return bool
     */
    public function inTenantContext()
    {
        return (user()->ofTenant() && Mf::tableHasTenant($this->table));
    }

    /**
     * Print value
     *
     * @return null|array|\Illuminate\Http\Request|string
     */
    public function print()
    {
        return $this->options[$this->value()] ?? '';
    }

}