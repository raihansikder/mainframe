<?php

namespace App\Mainframe\Features\Core;

use App\Mainframe\Features\Modular\BaseModule\Traits\ViewProcessorTrait;
use App\Mainframe\Features\Report\ReportBuilder;
use App\Mainframe\Features\Report\Traits\ReportViewProcessorTrait;
use App\Module;

class ViewProcessor
{
    use ViewProcessorTrait, ReportViewProcessorTrait;

    /** @var \App\User|null */
    public $user;

    /**
     * Variables shared in view blade
     *
     * @var array
     */
    public $vars;

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
    public $immutables=[];

    /** @var \App\Mainframe\Features\Datatable\Datatable */
    public $datatable;

    public function __construct($element = null)
    {
        $this->user = user();
        $this->setElement($element);
    }

}