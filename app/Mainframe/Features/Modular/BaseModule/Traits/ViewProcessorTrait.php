<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Features\Core\ViewProcessor;
use Str;

/** @mixin ViewProcessor $this */
trait ViewProcessorTrait
{
    /**
     * @param  string  $type
     * @return $this
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
     * @return $this
     */
    public function setElement($element)
    {
        $this->element = $element;

        return $this;
    }

    /**
     * @param  \App\Mainframe\Modules\Modules\Module  $module
     * @return $this
     */
    public function setModule($module)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder  $model
     * @return $this
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
     * @param  array  $dtColumns
     * @return $this
     */
    public function setDtColumns($dtColumns)
    {
        $this->dtColumns = $dtColumns;
        $this->vars = array_merge($this->vars, ['columns' => $dtColumns]);

        return $this;
    }

    /**
     * @param  \App\Mainframe\Features\Datatable\Datatable  $datatable
     * @return $this
     */
    public function setDatatable($datatable)
    {
        $this->datatable = $datatable;
        $this->setDtColumns($datatable->columns());

        // $this->vars = array_merge($this->vars, ['columns' => $datatable->columns()]);
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
            'uuid' => $this->element->uuid,
            'element' => $this->element,
            'formState' => 'create',
            'formConfig' => [
                'route' => $this->module->name.'.store',
                'class' => $this->module->name.'-form module-base-form create-form',
                'name' => $this->module->name,
                'files' => true,
            ],
            'editable' => true,
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
            'element' => $this->element,
            'formState' => 'edit',
            'formConfig' => [
                'route' => [$this->module->name.'.update', $this->element->id],
                'class' => $this->module->name.'-form module-base-form edit-form',
                'name' => $this->module->name,
                'files' => true,
                'method' => 'patch',
                'id' => $this->module->name.'Form',
            ],
            'editable' => $this->user->can('update', $this->element),
            'immutables' => $this->getImmutables(),
        ]);

        return $this->vars;
    }

    /**
     * Immutables
     * Get the array of immutable field names.
     * Originally the immutables are passed in view processor from module processor.
     *
     * @return array
     */
    public function getImmutables()
    {
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
    | Datatable render functions
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Datatable column titles
     *
     * @return array
     */
    public function dataTableTitles()
    {
        return collect($this->dtColumns)->map(function ($item, $key) {
            // Take 3rd index. Check datatable class select()
            return $item[2];
        })->all();
    }

    /**
     * Json column definition for datatable
     *
     * @return mixed
     */
    public function datatableColumnsJson()
    {
        return collect($this->dtColumns)->reduce(function ($carry, $item) {
            return $carry."{ data: '".$item[1]."', name: '".$item[0]."' },";
        });
    }

    /**
     * Datatable ajax route
     *
     * @return string
     */
    public function datatableAjaxRoute()
    {
        $route = route($this->module->name.'.datatable-json');

        return $route.'?'.parse_url(\URL::full(), PHP_URL_QUERY);
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

    /**
     * Check if tenant selector should be shown
     *
     * @return bool
     */
    public function showTenantSelector()
    {
        if (! $this->module->tenantEnabled()) {
            return false;
        }

        if ($this->user->tenant_id) {
            return false;
        }

        if ($this->user->isSuperUser()) {
            return true;
        }

        return false;
    }

}