<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Groups;

use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class GroupController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('groups');
    }

    /**
     * @param  null  $class
     * @return GroupDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new GroupDatatable($this->moduleName);
    }
}
