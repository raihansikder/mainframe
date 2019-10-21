<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\BaseModule;
use App\Mainframe\Modules\Modules\Traits\Scopes;
use App\Mainframe\Modules\Modules\Traits\Helpers;
use App\Mainframe\Modules\Modules\Traits\Mutators;
use App\Mainframe\Modules\Modules\Traits\Accessors;
use App\Mainframe\Modules\Modules\Traits\Relations;
use App\Mainframe\Modules\Modules\Traits\Mainframe;
use App\Mainframe\Modules\Modules\Observers\ModuleObserver;

/**
 * App\Mainframe\Modules\Modules\Module
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $model
 * @property string|null $controller
 * @property string|null $view
 * @property int|null $parent_id
 * @property int|null $module_group_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereModuleGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Modules\Module whereView($value)
 * @mixin \Eloquent
 */
class Module extends BaseModule
{

    use Helpers, Relations, Accessors, Mutators, Scopes, Mainframe;

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