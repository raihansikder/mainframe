<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Helpers\Modular\BaseController\ModuleBaseController;

class UploadController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('uploads');
    }

    /**
     * @param  null  $class
     * @return UploadDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new UploadDatatable($this->moduleName);
    }
}
