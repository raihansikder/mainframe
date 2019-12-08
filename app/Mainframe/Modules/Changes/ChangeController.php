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
     * @return ChangeDatatable
     */
    public function datatable()
    {
        return new ChangeDatatable($this->module);
    }
}
