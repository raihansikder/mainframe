<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Packages;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class PackageController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('packages');
    }

    /**
     * @return PackageDatatable
     */
    public function datatable()
    {
        return new PackageDatatable($this->module);
    }
}
