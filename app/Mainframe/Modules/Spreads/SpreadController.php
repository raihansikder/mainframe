<?php

namespace App\Mainframe\Modules\Spreads;

use App\Mainframe\Features\Modular\ModularController\ModularController;
use App\Mainframe\Modules\Spreads\Traits\SpreadControllerTrait;

/**
 * @group  Spread
 * APIs for managing spreads
 */
class SpreadController extends ModularController
{
    use SpreadControllerTrait;

    protected $moduleName = 'spreads';

    /*
    |--------------------------------------------------------------------------
    | Note : Keep this empty! Write codes in Trait.
    |--------------------------------------------------------------------------
    |
    | For default mainframe modules keep this empty. Write codes in Trait so
    | that the logic is portable and can be included  in new project modules
    |
    */

}
