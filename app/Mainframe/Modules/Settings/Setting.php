<?php

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Settings\Traits\SettingTrait;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Setting
 *
 * @property int $id TRIAL
 * @property string|null $uuid TRIAL
 * @property string|null $name TRIAL
 * @property string|null $title TRIAL
 * @property string|null $type TRIAL
 * @property string|null $description TRIAL
 * @property string|null $value TRIAL
 * @property int|null $is_active TRIAL
 * @property int|null $created_by TRIAL
 * @property int|null $updated_by TRIAL
 * @property \Illuminate\Support\Carbon|null $created_at TRIAL
 * @property \Illuminate\Support\Carbon|null $updated_at TRIAL
 * @property \Illuminate\Support\Carbon|null $deleted_at TRIAL
 * @property int|null $deleted_by TRIAL
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereCreatedBy($value)
 * @method static Builder|Setting whereDeletedAt($value)
 * @method static Builder|Setting whereDeletedBy($value)
 * @method static Builder|Setting whereDescription($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereIsActive($value)
 * @method static Builder|Setting whereName($value)
 * @method static Builder|Setting whereTitle($value)
 * @method static Builder|Setting whereType($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereUpdatedBy($value)
 * @method static Builder|Setting whereUuid($value)
 * @method static Builder|Setting whereValue($value)
 * @mixin \Eloquent
 * @method static Builder|BaseModule active()
 * @property-read \App\Project $project
 * @property-read \App\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Comment $latestComment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @method static Builder|Setting whereProjectId($value)
 * @method static Builder|Setting whereTenantId($value)
 * @property int|null $tenant_editable Some settings are not allowed to be edited by tenant
 * @method static Builder|Setting whereTenantEditable($value)
 */
class Setting extends BaseModule
{
    use SettingTrait;

    protected $moduleName = 'settings';
    protected $table      = 'settings';

    // protected $forceDeleting = false;
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
        'title',
        'type',
        'description',
        'value',
        'tenant_editable',
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
    /**
     * @var array Options for setting type
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

        static::saving(function (Setting $element) {

            // $element->error('message1');
            // $element->error('message2','key1');
            // $element->error('message3');
            // return false;
            // $element->messageBag()->add('messages', 'message2');
            // $element->messageBag()->add('messages', 'message3');
            // $element->messageBag()->add('messages', 'message4');
        });
        // static::creating(function (Setting $element) { });
        // static::updating(function (Setting $element) { });
        // static::created(function (Setting $element) { });
        // static::updated(function (Setting $element) { });
        // static::saved(function (Setting $element) { });
        // static::deleting(function (Setting $element) { });
        // static::deleted(function (Setting $element) { });
    }

    // Note: Put the functions in trait for project portability.
}
