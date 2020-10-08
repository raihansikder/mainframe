<?php 

namespace App\Projects\MyProject\Modules\Users;

use App\Projects\MyProject\Features\Report\ModuleReportBuilder;

class UserController extends \App\Mainframe\Modules\Users\UserController
{

    /**
     * Resolve the view blade for the module form
     *
     * @param string $state
     * @return string
     */
    public function form($state = 'create')
    {
        /** @var \App\User $user */
        $user = $this->element;

        // if ($user->->ofVendor()) {
        //     return $this->module->view_directory.'.form.vendor';
        // }
        //


        return $this->module->view_directory.'.form.default';

    }

    /**
     * @return UserDatatable
     */
    public function datatable()
    {
        return new UserDatatable($this->module);
    }

    /**
     * Returns a collection of objects as Json for an API call
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function listJson()
    {
        return (new UserList($this->module))->json();
    }

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

        return (new \App\Projects\MyProject\Features\Report\ModuleReportBuilder($this->module))->output();
    }

}
