<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\LoremIpsums;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class LoremIpsumController extends ModularController
{

    protected $name = 'lorem-ipsums';

    /**
     * @return LoremIpsumDatatable
     */
    public function datatable()
    {
        return new LoremIpsumDatatable($this->module);
    }
}
