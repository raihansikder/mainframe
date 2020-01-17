<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\ModularController\ModularController;

class SuperHeroController extends ModularController
{

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'super-heroes';

    /**
     * @return SuperHeroDatatable
     */
    public function datatable()
    {
        return new SuperHeroDatatable($this->module);
    }
}
