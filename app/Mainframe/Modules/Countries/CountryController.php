<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class CountryController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('countries');
    }

    /**
     * @return CountryDatatable
     */
    public function datatable()
    {
        return new CountryDatatable($this->module);
    }
}
