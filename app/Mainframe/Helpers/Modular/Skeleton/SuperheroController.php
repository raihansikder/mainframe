<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Superheroes;

use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class SuperheroController extends ModuleBaseController
{

    /**
     * Init with module name
     * SuperheroController constructor.
     */
    public function __construct()
    {
        parent::__construct('superheroes');
    }

    /**
     * @param  null  $class
     * @return SuperheroDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new SuperheroDatatable($this->moduleName);
    }
}
