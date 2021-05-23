<?php

namespace App\Mainframe\Modules\InAppNotifications\Traits;

use App\Mainframe\Features\Report\ModuleList;
use App\Mainframe\Modules\InAppNotifications\InAppNotificationController;
use App\Mainframe\Modules\InAppNotifications\InAppNotificationDatatable;

/** @mixin InAppNotificationController $this */
trait InAppNotificationControllerTrait
{
    /*
    |--------------------------------------------------------------------------
    | Existing Controller functions
    |--------------------------------------------------------------------------
    | Override the following list of functions to customize the behavior of the controller
    */
    /**
     * InAppNotification Datatable
     *
     * @return InAppNotificationDatatable
     */
    public function datatable()
    {
        return new InAppNotificationDatatable($this->module);
    }

    /**
     * List InAppNotification
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new ModuleList($this->module))->json();
    }

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
    */
}