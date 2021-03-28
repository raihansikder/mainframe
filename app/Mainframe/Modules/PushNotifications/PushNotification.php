<?php

namespace App\Mainframe\Modules\PushNotifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\PushNotifications\Traits\PushNotificationTrait;

/**
 * App\Mainframe\Modules\PushNotifications\PushNotification
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\PushNotifications\PushNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\PushNotifications\PushNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\PushNotifications\PushNotification query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 */
class PushNotification extends BaseModule
{
    // Note: Pull in necessary traits

    use PushNotificationTrait;

    protected $moduleName = 'push-notifications';
    protected $table      = 'push_notifications';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'user_id',
        'device_token',
        'in_app_notification_id',
        'order',
        'type',
        'event',
        'body',
        'data',
        'api_response',
        'multicast_id',
        'success_count',
        'failure_count',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // protected $casts = [];
    // protected $with = [];
    protected $appends = ['data_json', 'api_response_json'];

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
        self::observe(PushNotificationObserver::class);

        // static::saving(function (PushNotification $element) { });
        // static::creating(function (PushNotification $element) { });
        // static::updating(function (PushNotification $element) { });
        // static::created(function (PushNotification $element) { });
        // static::updated(function (PushNotification $element) { });
        // static::saved(function (PushNotification $element) { });
        // static::deleting(function (PushNotification $element) { });
        // static::deleted(function (PushNotification $element) { });
    }

}
