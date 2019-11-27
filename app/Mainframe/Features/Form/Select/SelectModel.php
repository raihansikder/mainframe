<?php

namespace App\Mainframe\Features\Form\Select;

use DB;
use Arr;
use App\Mainframe\Features\Mf;

class SelectModel extends SelectArray
{
    public $nameField;
    public $valueField;
    public $table;
    public $query;
    public $cache;

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);

        $this->nameField = $conf['name_field'] ?? 'name';
        $this->valueField = $conf['value_field'] ?? 'id';

        $this->table = $conf['table'] ?? null;
        $this->query = $conf['query'] ?? DB::table($this->table);
        $this->cache = $conf['cache'] ?? cacheTime('none');

        $this->options = $this->options();
    }

    public function options()
    {
        $query = $this->query->whereNull('deleted_at')->where('is_active', 1);
        if ($this->table && Mf::tenantContext($this->table, user())) {
            $query->where('tenant_id', user()->tenant_id);
        }
        /** @noinspection PhpUndefinedMethodInspection */
        $options = $query->pluck($this->nameField, $this->valueField)->toArray();
        $options = Arr::prepend($options, '-', null);

        return $options;
    }

}