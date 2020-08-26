<?php

namespace App\Projects\MyProject\Features\Modular\ModularController;

use App\Mainframe\Features\Modular\ModularController\ModularController as MfModularController;
use App\Projects\MyProject\Features\Report\ModuleList;
use App\Projects\MyProject\Features\Report\ModuleReportBuilder;

class ModularController extends MfModularController
{
    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    public function report()
    {
        if (! user()->can('view-report', $this->model)) {
            return $this->permissionDenied();
        }

        return (new ModuleReportBuilder($this->module))->output();
    }

    /**
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
    }

    /**
     * Get the view processor instance
     *
     * @return mixed|null
     */
    public function viewProcessor()
    {
        $classPaths = [
            $this->module->modelClassPath().'ViewProcessor', // Check in App\Mainframe\Modules
            'App\Projects\MyProject\Features\Modular\BaseModule\BaseModuleViewProcessor',
        ];

        foreach ($classPaths as $classPath) {
            if (class_exists($classPath)) {
                return (new $classPath);
            }
        }

        return null;
    }
}