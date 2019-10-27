<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Helpers\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Modules\Traits\Scopes;
use App\Mainframe\Modules\Modules\Traits\Helpers;
use App\Mainframe\Modules\Modules\Traits\Mutators;
use App\Mainframe\Modules\Modules\Traits\Accessors;
use App\Mainframe\Modules\Modules\Traits\Relations;
use App\Mainframe\Modules\Modules\Traits\MainframeModuleTrait;
use App\Mainframe\Modules\Modules\Observers\ModuleObserver;


class Module extends BaseModule
{

    use Helpers, Relations, Accessors, Mutators, Scopes, MainframeModuleTrait;

    protected $fillable = [
        'name', 'title', 'description', 'parent_id', 'module_group_id', 'level', 'order', 'color_css', 'icon_css', 'default_route', 'is_active', 'created_by',
        'updated_by', 'deleted_by', 'model', 'view', 'controller'
    ];

    /**
     * Automatic eager load relation by default (can be expensive)
     *
     * @var array
     */
    // protected $with = ['relation1', 'relation2'];

    ############################################################################################
    # Model events
    ############################################################################################

    public static function boot()
    {
        parent::boot();
        Module::observe(ModuleObserver::class);

        // static::creating(function (Module $element) { });

        // static::created(function (Module $element) { });

        // static::updating(function (Module $element) {});

        //static::updated(function (Module $element) {});

        static::saving(function (Module $element) {
            $valid = true;

            /************************************************************/
            // Your validation goes here
            // if($valid) $valid = $element->isSomethingDoable(true)
            /************************************************************/

            if ($valid) {
                // Fill default values
                $element->parent_id       = (! $element->parent_id) ? 0 : $element->parent_id;
                $element->module_group_id = (! $element->module_group_id) ? 0 : $element->module_group_id;
                $element->level           = (! $element->level) ? 0 : $element->level;
                $element->order           = (! $element->order) ? 0 : $element->order;
                $element->default_route   = (! $element->default_route) ? $element->name.'.index' : $element->default_route;
                $element->color_css       = (! $element->color_css) ? 'aqua' : $element->color_css;
                $element->icon_css        = (! $element->icon_css) ? 'fa fa-plus' : $element->icon_css;
            }

            return $valid;
        });

        // static::saved(function (Module $element) {});

        // static::deleting(function (Module $element) {});

        // static::deleted(function (Module $element) {});

        // static::restoring(function (Module $element) {});

        //static::restored(function (Module $element) {});
    }

}