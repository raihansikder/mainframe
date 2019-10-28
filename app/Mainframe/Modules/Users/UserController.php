<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class UserController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('users');
    }

    /**
     * @param  null  $class
     * @return UserDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new UserDatatable($this->moduleName);
    }
}
