<?php

namespace App\Mainframe\Modules\ModuleGroups;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\ModuleGroups\Traits\ModuleGroupTrait;

/**
 * App\Mainframe\Modules\ModuleGroups\ModuleGroup
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $description
 * @property string|null $route_path
 * @property string|null $route_name
 * @property int|null $parent_id
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
 * @property-read \App\Project $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereRouteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereRoutePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModuleGroup whereUuid($value)
 * @mixin \Eloquent
 */
class ModuleGroup extends BaseModule
{
    use ModuleGroupTrait;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'module-groups';
    protected $table      = 'module_groups';

    /*
    |--------------------------------------------------------------------------
    | Fillable attributes
    |--------------------------------------------------------------------------
    |
    | These attributes can be mass assigned
    */
    protected $fillable = [
        'name', 'title', 'description', 'parent_id', 'level', 'order',
        'color_css', 'icon_css', 'default_route', 'is_active',
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
        self::observe(ModuleGroupObserver::class);
        static::saving(function (ModuleGroup $element) {
            $element->parent_id = (!$element->parent_id) ? 0 : $element->parent_id;
            $element->level = (!$element->level) ? 0 : $element->level;
            $element->order = (!$element->order) ? 0 : $element->order;
            $element->default_route = (!$element->default_route) ? $element->name.'.index' : $element->default_route;
            $element->color_css = (!$element->color_css) ? 'aqua' : $element->color_css;
            $element->icon_css = (!$element->icon_css) ? 'fa fa-plus' : $element->icon_css;
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
   | Todo: Write Helper functions in the ModuleGroupHelper trait.
   */

}
