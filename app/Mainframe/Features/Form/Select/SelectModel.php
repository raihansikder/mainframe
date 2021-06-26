<?php

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Module;
use Illuminate\Support\Arr;

class SelectModel extends SelectArray
{
    public $nameField;
    public $valueField;
    public $table;

    /** @var BaseModule|null */
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
        $this->setModel();

        $this->query = $this->var['query'] ?? $this->getQuery(); // DB::table($this->table);
        $this->showInactive = $this->var['show_inactive'] ?? false;
        $this->cache = $this->var['cache'] ?? timer('none');

        $this->options = $this->options();
    }

    public function setModel()
    {
        if (isset($this->var['model'])) {
            $model = $this->var['model'];
            if (is_string($model)) {
                $model = new $model;
            }
            $this->model = $model;
        }

        if (isset($this->var['table'])) {
            $table = $this->var['table'];
            if ($module = Module::fromTable($table)) {
                $this->model = $module->modelInstance();
            }
        }

        return $this;
    }

    public function getQuery()
    {
        return $this->model;
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
        if (!$this->isMultiple()) {
            $options[null] = '-';  // Null fill empty selection
        }

        return Arr::sort($options);
    }

    /**
     * Check if currently in tenant context.
     *
     * @return bool
     */
    public function inTenantContext()
    {
        return user()->ofTenant() && isset($this->model) && $this->model->hasTenantContext();
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