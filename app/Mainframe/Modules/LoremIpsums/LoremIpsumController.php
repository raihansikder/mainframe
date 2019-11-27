<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\LoremIpsums;

use App\Mainframe\Features\Modular\BaseController\ModuleBaseController;

class LoremIpsumController extends ModuleBaseController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('lorem-ipsums');
    }

    /**
     * @param  null  $class
     * @return LoremIpsumDatatable
     */
    public function resolveDatatableClass($class = null)
    {
        return $class ?? new LoremIpsumDatatable($this->moduleName);
    }
}
