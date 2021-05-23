<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Uploads\Traits\UploadControllerTrait;

/**
 * @group  Uploads
 * APIs for managing uploads
 */
class UploadController extends ModularController
{
    use UploadControllerTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'uploads';

    /**
     * Datatable
     *
     * @return UploadDatatable
     */
    public function datatable()
    {
        return new UploadDatatable($this->module);
    }

}
