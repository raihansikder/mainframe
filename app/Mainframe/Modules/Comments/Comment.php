<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Comments\Traits\CommentTrait;

/**
 * App\Mainframe\Modules\Comments\Comment
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $body
 * @property string|null $commentable_type
 * @property int|null $commentable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
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
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $commentable
 * @property-read \App\User|null $creator
 * @property-read \App\Module|null $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUuid($value)
 * @mixin \Eloquent
 */
class Comment extends BaseModule
{
    use CommentTrait;

    protected $moduleName = 'comments';
    protected $table      = 'comments';

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
        'type',
        'body',
        'module_id',
        'element_id',
        'element_uuid',
        'commentable_id',
        'commentable_type',
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
        self::observe(CommentObserver::class);

        // static::saving(function (SuperHero $element) { });
        // static::creating(function (SuperHero $element) { });
        // static::updating(function (SuperHero $element) { });
        // static::created(function (SuperHero $element) { });
        // static::updated(function (SuperHero $element) { });
        // static::saved(function (SuperHero $element) { });
        // static::deleting(function (SuperHero $element) { });
        // static::deleted(function (SuperHero $element) { });
    }

}
