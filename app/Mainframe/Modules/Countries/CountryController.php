<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class CountryController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'countries';

    /**
     * @return CountryDatatable
     */
    public function datatable()
    {
        return new CountryDatatable($this->module);
    }
}
