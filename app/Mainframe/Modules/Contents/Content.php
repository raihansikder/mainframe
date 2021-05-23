<?php

namespace App\Mainframe\Modules\Contents;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Contents\Traits\ContentTrait;

/**
 * App\Mainframe\Modules\Contents\Content
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $key
 * @property string|null $title
 * @property string|null $body
 * @property string|null $parts JSON structure for additional dynamic parts
 * @property string|null $help_text Hint for how/where this is used
 * @property string|null $tags tags/spreadable
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
 * @property-read mixed $parts_array
 * @property-read \App\Module $linkedModule
 * @property-read \App\Project|null $project
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property-read \App\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereHelpText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereParts($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUuid($value)
 * @mixin \Eloquent
 */
class Content extends BaseModule
{
    use ContentTrait;

    protected $moduleName = 'contents';
    protected $table      = 'contents';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'project_id',
        'tenant_id',
        'uuid',
        'name',
        'key',
        'title',
        'body',
        'parts',
        'help_text',
        'tags',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        // 'parts' => 'array',
    ];
    // protected $with = [];
    protected $appends = ['parts_array'];
    protected $tagAttributes = ['tags'];

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
        self::observe(ContentObserver::class);

        // static::saving(function (Content $element) { });
        // static::creating(function (Content $element) { });
        // static::updating(function (Content $element) { });
        // static::created(function (Content $element) { });
        // static::updated(function (Content $element) { });
        // static::saved(function (Content $element) { });
        // static::deleting(function (Content $element) { });
        // static::deleted(function (Content $element) { });
    }



}
