<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Modules\Module;

class SuperHeroViewProcessor extends BaseModuleViewProcessor
{
    /** @var Module */
    public $module;

    /** @var \Illuminate\Database\Eloquent\Builder */
    public $model;

    /** @var SuperHero */
    public $element;

    /** @var bool */
    public $editable;

    /** @var array */
    public $immutables = [];

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

}