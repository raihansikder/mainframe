<?php

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Users\Traits\UserViewProcessorTrait;

class UserViewProcessor extends BaseModuleViewProcessor
{
    use UserViewProcessorTrait;

    /**
     * @var \App\Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model
     * @var User $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var User
     */
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