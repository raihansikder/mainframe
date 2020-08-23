<?php

namespace App\Mainframe\Features\Core;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
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