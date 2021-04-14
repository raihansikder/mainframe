<?php

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Changes\Traits\ChangeViewProcessorTrait;

class ChangeViewProcessor extends BaseModuleViewProcessor
{
    use ChangeViewProcessorTrait;

    /**
     * @var \App\Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model
     * @var Change $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var Change
     */
    public $element;
    // public $immutables;
    // public $transitions;
    // public $trackedFields;

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