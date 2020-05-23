<?php /** @noinspection PhpVariableVariableInspection */

namespace App\Mainframe\Features\Form\Select;

use App\Mainframe\Modules\Modules\Module;

class SelectAjax extends SelectModel
{
    public $url;
    public $preload;

    public function __construct($var = [], $element = null)
    {
        parent::__construct($var, $element);

        $this->preload = $this->var['preload'] ?? $this->preload();
        $this->containerClass = $this->var['container_class'] ?? $this->var['div'] ?? 'col-md-6';
        $this->params['class'] .= ' ajax ';
        $this->url = $this->var['url'] ?? $this->url();
    }

    /**
     * @return mixed
     */
    public function preload()
    {
        if ($this->value()) {
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
            $moduleName = Module::fromTable($this->table)->name;

            return route($moduleName.'.list-json');
        }

        return $this->url;
    }

}