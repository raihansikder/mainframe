<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\DolorSits;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class DolorSitController extends ModularController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('dolor-sits');
    }

    /**
     * @return DolorSitDatatable
     */
    public function datatable()
    {
        return new DolorSitDatatable($this->module);
    }
}
