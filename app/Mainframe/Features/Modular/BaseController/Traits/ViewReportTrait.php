<?php

namespace App\Mainframe\Features\Modular\BaseController\Traits;

use App\Mainframe\Features\Report\ModuleReportBuilder;

/** @mixin \App\Mainframe\Features\Modular\BaseController\ModuleBaseController $this */
trait ViewReportTrait
{

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed|void
     */
    public function report()
    {

        if (! user()->can('viewAny', $this->model)) {
            return $this->response->permissionDenied();
        }

        return (new ModuleReportBuilder($this->module))->show();

    }

}