<?php

namespace App\Projects\MyProject\Features\Modular\ModularController;

use App\Mainframe\Features\Modular\ModularController\Traits\ModularControllerTrait;
use App\Mainframe\Features\Modular\ModularController\Traits\RequestProcessorTrait;
use App\Mainframe\Features\Modular\ModularController\Traits\RequestValidator;
use App\Mainframe\Features\Modular\ModularController\Traits\Resolvable;
use App\Module;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Projects\MyProject\Features\Report\ModuleList;
use App\Projects\MyProject\Features\Report\ModuleReportBuilder;
use App\Projects\MyProject\Http\Controllers\BaseController;

class ModularController extends BaseController
{
    use RequestValidator, RequestProcessorTrait, Resolvable, ModularControllerTrait;

    /**
     * Module name
     *
     * @var string
     */
    protected $moduleName;

    /**
     * @var Module
     */
    protected $module;

    /**
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $model;

    /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule */
    protected $element;

    /** @var \App\Mainframe\Features\Modular\Validator\ModelProcessor */
    protected $processor;

    /**
     * ModularController constructor.
     */
    public function __construct()
    {
        parent::__construct();

        // Load
        $this->module = Module::byName($this->moduleName);
        $this->model = $this->module->modelInstance();
        $this->view = $this->viewProcessor()->setModule($this->module)->setModel($this->model);

        // Share these variables in  all views
        \View::share([
            'module' => $this->module,
            'model' => $this->model,
            'view' => $this->view,
        ]);
    }

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    public function report()
    {
        if (!user()->can('view-report', $this->model)) {
            return $this->permissionDenied();
        }

        // Note: Utilize project asset instead of Mainframe default
        return (new ModuleReportBuilder($this->module))->output();
    }

    /**
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        // Note: Utilize project asset instead of Mainframe default
        return (new ModuleList($this->module))->json();
    }


}