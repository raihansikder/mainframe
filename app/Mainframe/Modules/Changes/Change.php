<?php

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;

/**
 * App\Mainframe\Modules\Changes\Change
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User $creator
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant $tenant
 * @property-read \App\User $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change query()
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property int|null $changeable_id
 * @property string|null $changeable_type
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $field
 * @property string|null $old
 * @property string|null $new
 * @property string|null $note
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \App\Mainframe\Modules\Changes\Change|null $changeable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereChangeableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereChangeableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereUuid($value)
 */
class Change extends BaseModule
{
    use ChangeHelper;

    protected $moduleName = 'changes';
    protected $table      = 'changes';

    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'changeable_id',
        'changeable_type',
        'module_id',
        'element_id',
        'element_uuid',
        'field',
        'old',
        'new',
        'note',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // protected $casts = [];
    // protected $with = [];
    // protected $appends = [];

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    */
    // public static $types = [];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    |
    | Register the observer in the boot method. You can also make use of
    | model events like saving, creating, updating etc to further
    | manipulate the model
    */
    public static function boot()
    {
        parent::boot();
        self::observe(ChangeObserver::class);
        static::saving(function (Change $element) {
            $element->fillModuleAndElementData();
        });
        // static::creating(function (Change $element) { });
        // static::updating(function (Change $element) { });
        // static::created(function (Change $element) { });
        // static::updated(function (Change $element) { });
        // static::saved(function (Change $element) { });
        // static::deleting(function (Change $element) { });
        // static::deleted(function (Change $element) { });
    }

    /**
     * Fill data to relate this upload with another module element.
     *
     * @return $this
     */
    public function fillModuleAndElementData()
    {

        $module  = $this->linkedModule;
        $element = null;

        if ($module) {
            /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $model */
            $model                = $module->model;
            $this->changable_type = trim($module->model, '\\');
        }

        if ($module && isset($this->element_id)) {
            $element = $model::remember(timer('very-long'))
                ->find($this->element_id);
        }

        if ($element) {
            $this->changable_id = $element->id;
            $this->element_uuid = $element->uuid;
        }

        return $this;

    }

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */
    // public function getUrlAttribute(){return asset($this->path); }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function changeable() { return $this->morphTo(); }
}
