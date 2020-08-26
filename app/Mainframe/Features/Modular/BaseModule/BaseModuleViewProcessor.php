<?php

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Features\Core\ViewProcessor;
use App\Mainframe\Modules\Modules\Module;
use Illuminate\Support\Str;

class BaseModuleViewProcessor extends ViewProcessor
{

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
     * BaseModuleViewProcessor constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|null  $element
     */
    public function __construct($element = null)
    {
        parent::__construct();

        if ($element) {
            $this->element = $element;
        }

        if ($this->element) {
            $this->module = $element->module();
            $this->model = $element->newInstance();
        }

    }

    /**
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     * @return BaseModuleViewProcessor
     */
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * @param  \App\Mainframe\Modules\Modules\Module  $module
     * @return BaseModuleViewProcessor
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $model
     * @return BaseModuleViewProcessor
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

    /*
    |--------------------------------------------------------------------------
    | Blade template locations
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Resolve the view blade for the module form
     *
     * @param  string  $state
     * @return string
     */
    public function formPath($state = 'create')
    {
        $default = $this->module->view_directory.'.form.default';
        if ($state == 'create') {
            return $default;
        }

        return $default;
    }

    /**
     * @return string
     */
    public function gridPath()
    {
        return $this->module->view_directory.'.grid.default';
    }

    /**
     * @return string
     */
    public function changesPath()
    {
        return 'mainframe.layouts.module.changes.index';
    }

    /*
    |--------------------------------------------------------------------------
    | View Variables
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Obtain the variables shared in a module create form
     *
     * @return array
     */
    public function varsCreate()
    {
        $this->addVars([
            'uuid'       => $this->element->uuid,
            'element'    => $this->element,
            'formState'  => 'create',
            'formConfig' => [
                'route' => $this->module->name.'.store',
                'class' => $this->module->name.'-form module-base-form create-form',
                'name'  => $this->module->name,
                'files' => true,
            ],
            'editable'   => true,
            'immutables' => $this->getImmutables(),
        ]);

        return $this->vars;
    }

    /**
     * Obtain the variables shared in a module edit form
     *
     * @return array
     */
    public function viewVarsEdit()
    {
        $this->addVars([
            'element'    => $this->element,
            'formState'  => 'edit',
            'formConfig' => [
                'route'  => [$this->module->name.'.update', $this->element->id],
                'class'  => $this->module->name.'-form module-base-form edit-form',
                'name'   => $this->module->name,
                'files'  => true,
                'method' => 'patch',
                'id'     => $this->module->name.'Form',
            ],
            'editable'   => $this->user->can('update', $this->element),
            'immutables' => $this->getImmutables(),
        ]);

        return $this->vars;
    }

    /**
     * Get the array of immutable field names
     *
     * @return array
     */
    public function getImmutables()
    {

        if ($this->isEditing()) {
            $this->immutables = $this->element->processor()->getImmutables();
        }

        return $this->immutables;
    }

    /**
     * Check if the element is being edited
     *
     * @return bool
     */
    public function isEditing()
    {
        return isset($this->element) && $this->element->isCreated();
    }

    /**
     * Generate form title
     *
     * @return string
     */
    public function formTitle()
    {
        return Str::singular($this->module->title);
    }

    /*
    |--------------------------------------------------------------------------
    | Condition functions to show a section in view
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Check visibility of create button
     *
     * @return bool
     */
    public function showFormCreateBtn()
    {
        return $this->user->can('create', $this->model);
    }

    /**
     * Check visibility of list button
     *
     * @return bool
     */
    public function showFormListBtn()
    {
        return $this->user->can('view-any', $this->model);
    }

    /**
     * Check visibility of report button
     *
     * @return bool
     */
    public function showReportLink()
    {

        return $this->user->can('view-report', $this->model);
    }

}