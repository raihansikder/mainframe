<?php

namespace App\Mainframe\Modules\Settings\Traits;

use App\Mainframe\Modules\Settings\SettingViewProcessor;

/** @mixin SettingViewProcessor */
trait SettingViewProcessorTrait
{

    public function immutables()
    {
        if ($this->user->isSuperUser()) {
            return $this->immutables;

        }

        $this->addImmutables([
            'tenant_id',
            'uuid',
            'name',
            'title',
            'type',
            'description',
            // 'value',
            'tenant_editable',
            'is_active',
        ]);

        return $this->immutables;
    }
}