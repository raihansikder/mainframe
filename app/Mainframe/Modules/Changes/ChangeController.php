<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class ChangeController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('changes');
    }

    /**
     * @param  null  $class
     * @return ChangeDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new ChangeDatatable($this->name);
    }
}
