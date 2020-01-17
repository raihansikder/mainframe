<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Samples\LoremIpsums;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class LoremIpsumController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'lorem-ipsums';

    /**
     * @return LoremIpsumDatatable
     */
    public function datatable()
    {
        return new LoremIpsumDatatable($this->module);
    }
}
