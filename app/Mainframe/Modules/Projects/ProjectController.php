<?php

namespace App\Mainframe\Modules\Projects;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Projects\Traits\ProjectControllerTrait;

/**
 * @group  Projects
 * APIs for managing projects
 */
class ProjectController extends ModularController
{
    use ProjectControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'projects';

}
