<?php

namespace App\Projects\MyProject\Modules\Settings;

use App\Mainframe\Modules\Settings\Traits\SettingTrait;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

/**
 * App\Projects\MyProject\Modules\Settings\Setting
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description
 * @property string|null $value
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Settings\Setting whereValue($value)
 */
class Setting extends BaseModule
{
    use SettingTrait, SettingHelper;

    protected $moduleName = 'settings';
    protected $table      = 'settings';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'title',
        'type',
        'description',
        'value',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // protected $casts = [];
    // protected $with = [];
    // protected $appends = [];

    /*
    |--------------------------------------------------------------------------
    | Option values
    |--------------------------------------------------------------------------
    */
    // public static $types = [];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        self::observe(SettingObserver::class);

        // static::saving(function (Setting $element) { });
        // static::creating(function (Setting $element) { });
        // static::updating(function (Setting $element) { });
        // static::created(function (Setting $element) { });
        // static::updated(function (Setting $element) { });
        // static::saved(function (Setting $element) { });
        // static::deleting(function (Setting $element) { });
        // static::deleted(function (Setting $element) { });
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

}
