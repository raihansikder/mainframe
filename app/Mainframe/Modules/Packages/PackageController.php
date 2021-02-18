<?php

namespace App\Mainframe\Modules\Packages;

use App\Mainframe\Features\Modular\ModularController\ModularController;

/**
 * @group  Packages
 * APIs for managing packages
 */
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
