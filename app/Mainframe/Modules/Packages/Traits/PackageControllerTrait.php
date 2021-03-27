<?php

namespace App\Mainframe\Modules\Packages\Traits;

use App\Mainframe\Modules\Packages\PackageDatatable;

trait PackageControllerTrait
{
    /**
     * @return PackageDatatable
     */
    public function datatable()
    {
        return new PackageDatatable($this->module);
    }
}