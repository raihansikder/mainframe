<?php

namespace App\Mainframe\Modules\Countries\Traits;

use App\Mainframe\Modules\Countries\CountryDatatable;

trait CountryControllerTrait
{

    /**
     * @return CountryDatatable
     */
    public function datatable()
    {
        return new CountryDatatable($this->module);
    }
}