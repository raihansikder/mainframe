<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Packages;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class PackageController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'packages';

    /**
     * @return PackageDatatable
     */
    public function datatable()
    {
        return new PackageDatatable($this->module);
    }
}
