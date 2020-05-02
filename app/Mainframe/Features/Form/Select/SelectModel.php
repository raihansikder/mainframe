<?php

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Helpers\Mf;
use DB;
use Illuminate\Support\Arr;

class SelectModel extends SelectArray
{
    public $nameField;
    public $valueField;
    public $table;
    public $query;
    public $showInactive;
    public $cache;

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);

        $this->nameField = $conf['name_field'] ?? 'name';
        $this->valueField = $conf['value_field'] ?? 'id';

        $this->table = $conf['table'] ?? null; // Must have table
        $this->query = $conf['query'] ?? DB::table($this->table);
        $this->showInactive = $conf['show_inactive'] ?? false;
        $this->cache = $conf['cache'] ?? timer('none');

        $this->options = $this->options();
    }

    /**
     * Select options
     *
     * @return array
     */
    public function options()
    {
        $query = $this->query->whereNull('deleted_at');
        if (! $this->showInactive) {
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
        $options[null] = '-';  // Null fill empty selection

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