<?php

namespace App\Mainframe\Features\Audit;

class Audit extends \OwenIt\Auditing\Models\Audit
{
    // use ModularTrait;

    protected static function boot()
    {
        parent::boot();
        static::creating(function (Audit $element) {
            $element->auditable_type = 'App\\'.class_basename($element->auditable_type);
            // $element->fillModuleAndElement('auditable');
        });

    }

}