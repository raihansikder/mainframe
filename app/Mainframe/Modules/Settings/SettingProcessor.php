<?php /** @noinspection SenselessProxyMethodInspection */

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Features\Modular\Validator\ModelProcessor;
use App\Mainframe\Modules\Settings\Traits\SettingProcessorTrait;

/** @mixin \App\Setting $this->element */
class SettingProcessor extends ModelProcessor
{

    use SettingProcessorTrait;

    public $trackedFields = [
        'name', 'title',
    ];

}