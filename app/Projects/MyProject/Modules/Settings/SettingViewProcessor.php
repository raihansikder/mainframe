<?php

namespace App\Projects\MyProject\Modules\Settings;

use App\Projects\MyProject\Features\Modular\BaseModule\BaseModuleViewProcessor;
use App\Mainframe\Modules\Modules\Module;

class SettingViewProcessor extends BaseModuleViewProcessor
{
    /**
     * @var Module $module
     * @var \Illuminate\Database\Eloquent\Builder $model test
     * @var Setting $element
     * @var bool $editable
     * @var array $immutables
     * @var string $type i.e. View type create, edit, index etc.
     * @var array $vars Variables shared in view blade
     */

    /**
     * @var Setting
     */
    public $element;
    public $immutables = ['name'];

}