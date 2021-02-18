<?php

namespace App\Mainframe\Modules\Projects;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Projects
 * APIs for managing projects
 */
class ProjectController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'projects';

    /**
     * @return ProjectDatatable
     */
    public function datatable()
    {
        return new ProjectDatatable($this->module);
    }
}
