<?php

namespace App\Projects\MyProject\Modules\Uploads;

/**
 * @group  Uploads
 * APIs for managing uploads
 */
class UploadController extends \App\Mainframe\Modules\Uploads\UploadController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'uploads';

    /**
     * @return UploadDatatable
     */
    public function datatable()
    {
        return new UploadDatatable($this->module);
    }
}
