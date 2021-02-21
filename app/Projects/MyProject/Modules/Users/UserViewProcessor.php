<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Mainframe\Modules\Modules\Module;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModuleViewProcessor;

class UserViewProcessor extends BaseModuleViewProcessor
{
    /**
     * @var Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model test
     * @var \App\Projects\MyProject\Modules\Users\User $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var \App\Projects\MyProject\Modules\Users\User
     */
    public $element;

    // public function formPath($state = 'create') { return parent::formPath($state) }
    // public function gridPath()
    // ... See parent class for available functions

}