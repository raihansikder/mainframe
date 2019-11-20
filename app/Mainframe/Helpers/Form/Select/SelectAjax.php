<?php

namespace App\Mainframe\Helpers\Form\Select;

use App\Mainframe\Modules\Modules\Module;

class SelectAjax extends SelectModel
{
    public $url;
    public $preload;

    public function __construct($conf = [], $element = null)
    {
        parent::__construct($conf, $element);

        $this->preload = $conf['preload'] ?? $this->preload();
        $this->containerClass = $conf['container_class'] ?? 'col-md-6';
                $this->params['class'] .= ' ajax ';
        $this->url = $conf['url'] ?? $this->url();
    }

    /**
     * @return mixed
     */
    public function preload()
    {
        if ($this->value()) {
            /** @noinspection PhpUndefinedMethodInspection */
            $item = \DB::table($this->table)
                ->select([$this->valueField, $this->nameField])
                ->where($this->valueField, $this->value())
                ->first();

            $nameField = $this->nameField;
            if ($item) {
                return $item->$nameField;
            }
        }

        return $this->preload;
    }

    public function url()
    {
        if ($this->table) {
            $moduleName = Module::nameFromTable($this->table);

            return route($moduleName.'.list-json');
        }

        return $this->url;
    }

}