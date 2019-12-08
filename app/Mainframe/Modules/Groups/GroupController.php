<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Groups;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

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
     * @return GroupDatatable
     */
    public function datatable()
    {
        return new GroupDatatable($this->module);
    }
}
