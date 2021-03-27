<?php

namespace App\Mainframe\Modules\InAppNotifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\InAppNotifications\Traits\InAppNotificationTrait;

/**
 * App\Mainframe\Modules\InAppNotifications\InAppNotification
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\InAppNotifications\InAppNotification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\InAppNotifications\InAppNotification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\InAppNotifications\InAppNotification query()
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $notifiable_type Class of the notifiable
 * @property int|null $notifiable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property int|null $user_id Recipient user id
 * @property string|null $type
 * @property string|null $event Name of the event i.e. "appointment.created"
 * @property string|null $subtitle Subtitle the notification
 * @property string|null $body Main body of the notification
 * @property string|null $images JSON array of image URLs
 * @property string|null $data Additional JSON payload
 * @property int|null $order Can be useful for sequencing if needed
 * @property int|null $is_visible Flag to indicate whether this entry should be visible in the user notification list
 * @property int|null $announcement_id Announcement id from which it is generated
 * @property int|null $accepts_response Flag to indicate whether user can respond to this notification
 * @property string|null $response_options JSON to show response options
 * @property string|null $response Capture user response to an announcement
 * @property string|null $responded_at Capture user response datetime
 * @property string|null $read_at Set the time stamp when a user "marks as read"
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereAcceptsResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereAnnouncementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereEvent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereIsVisible($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereNotifiableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereNotifiableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereRespondedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereResponse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereResponseOptions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereSubtitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|InAppNotification whereUuid($value)
 * @property-read mixed $data_json
 * @property-read mixed $images_json
 * @property-read mixed $response_json
 * @property-read mixed $response_options_json
 * @property-read \App\Mainframe\Modules\Modules\Module|null $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $notifiable
 * @property-read \App\User|null $user
 */
class InAppNotification extends BaseModule
{
    use  InAppNotificationTrait;

    protected $moduleName = 'in-app-notifications';
    protected $table      = 'in_app_notifications';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'notifiable_type',
        'notifiable_id',
        'module_id',
        'element_id',
        'name',
        'user_id',
        'type',
        'event',
        'subtitle',
        'body',
        'images',
        'data',
        'order',
        'is_visible',
        'announcement_id',
        'accepts_response',
        'response_options',
        'response',
        'responded_at',
        'read_at',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts = [
        'data' => 'array',
    ];
    // protected $with = [];
    protected $appends = [
        'data_json', 'response_json', 'response_options_json', 'images_json',
    ];

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
        self::observe(InAppNotificationObserver::class);

        static::saving(function (InAppNotification $element) {
            $element->fillModuleAndElementData();
            // $element->populate();
        });
        // static::creating(function (InAppNotification $element) { });
        // static::updating(function (InAppNotification $element) { });
        // static::created(function (InAppNotification $element) { });
        // static::updated(function (InAppNotification $element) { });
        // static::saved(function (InAppNotification $element) { });
        // static::deleting(function (InAppNotification $element) { });
        // static::deleted(function (InAppNotification $element) { });
    }

}
