<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Mainframe\Modules\Users\Traits\UserControllerTrait;
use App\Projects\MyProject\Features\Modular\ModularController\ModularController;
use App\Projects\MyProject\Features\Report\ModuleList;
use App\Projects\MyProject\Features\Report\ModuleReportBuilder;

/**
 * @group  Users
 * APIs for managing users
 */
class UserController extends ModularController
{
    use UserControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'users';

    /*
    |--------------------------------------------------------------------------
    | Existing Controller functions
    |--------------------------------------------------------------------------
    | Override the following list of functions to customize the behavior of the controller
    |
    */
    /**
     * @return UserDatatable
     */
    public function datatable()
    {
        return new UserDatatable($this->module);
    }

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    // public function report(){if (! user()->can('view-report', $this->model)) {return $this->permissionDenied();}return (new ModuleReportBuilder($this->module))->output();}

    /**
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    // public function listJson() { return (new ModuleList($this->module))->json(); }

    /**
     * Get the view processor instance
     *
     * @return mixed|null
     */
    // public function viewProcessor()
    // {
    //     return new UserViewProcessor();
    // }

    /**
     * Show and render report
     *
     * @return bool|\Illuminate\Contracts\View\Factory|\Illuminate\Http\JsonResponse|\Illuminate\Support\Collection|\Illuminate\View\View|mixed
     */
    // public function report() { }
    // public function transformInputRequests() { }
    // public function storeRequestValidator() { }
    // public function updateRequestValidator() { }
    // public function saveRequestValidator() { }
    // public function attemptStore() { }
    // public function attemptUpdate() { }
    // public function attemptDestroy() { }
    // public function stored() { }
    // public function updated() { }
    // public function saved() { }
    // public function deleted() { }

    /*
    |--------------------------------------------------------------------------
    | Custom Controller functions
    |--------------------------------------------------------------------------
    | Write down additional controller functions that might be required for your project to handle bu
    |
    */

}
