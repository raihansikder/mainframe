<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class SuperHeroController extends ModularController
{

    /**
     * Init with module name
     */
    public function __construct()
    {
        parent::__construct('super-heroes');
    }

    /**
     * @return SuperHeroDatatable
     */
    public function datatable()
    {
        return new SuperHeroDatatable($this->module);
    }
}
