<?php

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Features\Core\ViewProcessor;

class BaseModuleView extends ViewProcessor
{

    /**
     * @var \App\Mainframe\Modules\Modules\Module $module
     * @var \App\User $element
     * @var string $formState create|edit
     * @var array $formConfig
     * @var string $uuid Only available for create
     * @var bool $editable
     */

    public $module;
    public $model;
    public $element;
    public $uuid;
    public $columns;
    public $function;
    public $editable;
    public $immutables;

    public function sharedVariables()
    {

    }

}