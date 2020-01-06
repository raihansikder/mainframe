<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Projects;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class ProjectController extends ModularController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('projects');
    }

    /**
     * @return ProjectDatatable
     */
    public function datatable()
    {
        return new ProjectDatatable($this->module);
    }
}
