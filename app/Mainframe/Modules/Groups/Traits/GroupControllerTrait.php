<?php

namespace App\Mainframe\Modules\Groups\Traits;

use App\Mainframe\Modules\Groups\GroupDatatable;

trait GroupControllerTrait
{
    /**
     * @return GroupDatatable
     */
    public function datatable()
    {
        return new GroupDatatable($this->module);
    }
}