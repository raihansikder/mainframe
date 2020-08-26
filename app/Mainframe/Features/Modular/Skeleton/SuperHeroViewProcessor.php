<?php

namespace App\Mainframe\Modules\SuperHeroes;

use App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Modules\Module;

class SuperHeroViewProcessor extends BaseModuleViewProcessor
{
    /**
     * @var Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model test
     * @var SuperHero $element
     * @var bool $editable
     *
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var \App\Mainframe\Modules\SuperHeroes\SuperHero
     */
    public $element;

    // public function formPath($state = 'create') { return parent::formPath($state) }
    // public function gridPath()
    // ... See parent class for available functions

}