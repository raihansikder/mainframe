<?php

namespace App\Mainframe\Modules\Spreads;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Spreads\Traits\SpreadProcessorTrait;

class SpreadProcessor extends ModelProcessor
{
    use SpreadProcessorTrait;

    /** @var Spread */
    public $element;

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