<?php

namespace App\Mainframe\Modules\InAppNotifications;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\InAppNotifications\Traits\InAppNotificationTrait;

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
