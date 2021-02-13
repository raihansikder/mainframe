<?php

namespace App\Mainframe\Features\Core;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Modules\Module;
use Illuminate\Support\Str;

class ViewProcessor
{
    /** @var \App\User|null */
    protected $user;

    /**
     * Variables shared in view blade
     *
     * @var array
     */
    public $vars = [];

    /**
     * Type of view create, edit, index
     *
     * @var string
     */
    public $type;

    /** @var Module */
    public $module;

    /** @var \Illuminate\Database\Eloquent\Builder */
    public $model;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    public $element;

    /** @var bool */
    public $editable;

    /** @var array */
    public $immutables = [];

    /**
     * MainframeBaseController constructor.
     */
    public function __construct()
    {
        $this->user = user();
    }

    /**
     * @param  string  $type
     * @return \App\Mainframe\Features\Core\ViewProcessor
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @param $vars
     * @return $this
     */
    public function addVars($vars)
    {
        $this->vars = array_merge($this->vars, $vars);

        return $this;
    }

    public function getVars()
    {
        return $this->vars;
    }

    /**
     * @param $vars
     * @return $this
     */
    public function setVars($vars)
    {
        $this->vars = $vars;

        return $this;
    }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return \App\Mainframe\Features\Core\ViewProcessor
     */
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * @param  \App\Mainframe\Modules\Modules\Module  $module
     * @return \App\Mainframe\Features\Core\ViewProcessor
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $model
     * @return \App\Mainframe\Features\Core\ViewProcessor
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * @param $editable
     * @return $this
     */
    public function setEditable($editable)
    {
        $this->editable = $editable;

        return $this;
    }

    /**
     * @param $immutables
     * @return $this
     */
    public function setImmutable($immutables)
    {
        $this->immutables = $immutables;

        return $this;
    }

    /**
     * @param $immutables
     * @return $this
     */
    public function addImmutables($immutables)
    {
        $this->immutables = array_merge($this->immutables, $immutables);

        return $this;
    }

    /**
     * Check if a function exists with same signature and return the result
     *
     * @param $signature
     * @return bool
     */
    public function show($signature)
    {
        $method = 'show'.Str::camel($signature);
        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return false;
    }


}