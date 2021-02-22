<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;

class SuperHeroViewProcessor extends BaseModuleViewProcessor
{
    /**
     * @var \App\Mainframe\Modules\Modules\Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model
     * @var SuperHero $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var SuperHero
     */
    public $element;

    // public function formPath($state = 'create') { return parent::formPath($state) }
    // public function gridPath()
    // ... See parent class for available functions

}