<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Samples\DolorSits;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class DolorSitController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'dolor-sits';

    /**
     * @return DolorSitDatatable
     */
    public function datatable()
    {
        return new DolorSitDatatable($this->module);
    }
}
