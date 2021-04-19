<?php

namespace App\Mainframe\Modules\Modules;

use App\Mainframe\Modules\Modules\Traits\ModuleTrait;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;

/**
 * App\Mainframe\Modules\Modules\Module
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $module_table
 * @property string|null $route_path /relative/path/to/index
 * @property string|null $route_name some.name
 * @property string|null $class_directory app/Mainframe/Modules/SomeModules
 * @property string|null $namespace
 * @property string|null $model app/Mainframe/Modules/SomeModules/NameOfModule
 * @property string|null $policy
 * @property string|null $processor
 * @property string|null $controller
 * @property string|null $view_directory
 * @property int|null $parent_id
 * @property int|null $module_group_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property int|null $is_visible
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Module query()
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereClassDirectory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereController($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereModuleTable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereNamespace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module wherePolicy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereProcessor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereRoutePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Module whereViewDirectory($value)
 * @mixin \Eloquent
 */
class Module extends BaseModule
{
    use ModuleTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'modules';
    protected $table      = 'modules';

    /*
    |--------------------------------------------------------------------------
    | Fillable attributes
    |--------------------------------------------------------------------------
    |
    | These attributes can be mass assigned
    */
    protected $fillable = [
        'uuid',
        'name',
        'project_id',
        'tenant_id',
        'title',
        'description',
        'module_table',
        'route_path',
        'route_name',
        'class_directory',
        'namespace',
        'model',
        'policy',
        'processor',
        'controller',
        'view',
        'parent_id',
        'module_group_id',
        'level',
        'order',
        'default_route',
        'color_css',
        'icon_css',
        'is_active',
    ];

    /*
    |--------------------------------------------------------------------------
    | Guarded attributes
    |--------------------------------------------------------------------------
    |
    | The attributes can not be mass assigned.
    */
    // protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Type cast dates
    |--------------------------------------------------------------------------
    |
    | Type cast attributes as date. This allows to create a Carbon object.
    | Of the dates
   */
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | Type cast attributes
    |--------------------------------------------------------------------------
    |
    | Type cast attributes (helpful for JSON)
    */
    // protected $casts = [];

    /*
    |--------------------------------------------------------------------------
    | Automatic eager load
    |--------------------------------------------------------------------------
    |
    | Auto load these relations whenever the model is retrieved.
    */
    // protected $with = [];

    /*
    |--------------------------------------------------------------------------
    | Append new attributes to the model
    |--------------------------------------------------------------------------
    |
    | If you want to append a new attribute that doesn't exists in the table
    | you should first create and accessor getNewFieldAttribute and then
    | add the attribute name in the array
    */
    // protected $appends = [];

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | Your model can have one or more public static variables that stores
    | The possible options for some field. Variable name should be
    |
    */
    // public static $types = [];
    // public static $statuses = [];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    |
    | Register the observer in the boot method. You can also make use of
    | model events like saving, creating, updating etc to further
    | manipulate the model
    */
    protected static function boot()
    {
        parent::boot();
        self::observe(ModuleObserver::class);

        static::saving(function (Module $element) {
            // Fill default values
            $element->parent_id = (! $element->parent_id) ? 0 : $element->parent_id;
            $element->module_group_id = (! $element->module_group_id) ? 0 : $element->module_group_id;
            $element->level = (! $element->level) ? 0 : $element->level;
            $element->order = (! $element->order) ? 0 : $element->order;
            $element->default_route = (! $element->default_route) ? $element->name.'.index' : $element->default_route;
            $element->color_css = (! $element->color_css) ? 'aqua' : $element->color_css;
            $element->icon_css = (! $element->icon_css) ? 'fa fa-plus' : $element->icon_css;
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    //public function scopePopular($query) { return $query->where('votes', '>', 100); }
    //public function scopeWomen($query) { return $query->whereGender('W'); }
    /*
    Usage: $users = User::popular()->women()->orderBy('created_at')->get();
    */

    //public function scopeOfType($query, $type) { return $query->whereType($type); }
    /*
    Usage:  $users = User::ofType('member')->get();
    */

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    |
    | Write model relations (belongsTo,hasMany etc) at the bottom the file
    */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function creator() { return $this->belongsTo(\App\User::class, 'created_by'); }

    /*
   |--------------------------------------------------------------------------
   | Todo: Helper functions
   |--------------------------------------------------------------------------
   | Todo: Write Helper functions in the SuperHeroHelper trait.
   */

}