<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Uploads\Traits\UploadTrait;

class Upload extends BaseModule
{
    use UploadTrait;

    public const TYPE_PROFILE_PIC = 'Profile Picture';
    public const TYPE_LOGO        = 'Logo';

    protected $moduleName = 'uploads';
    protected $table      = 'uploads';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'type',
        'path',
        'order',
        'ext',
        'bytes',
        'description',
        'module_id',
        'element_id',
        'element_uuid',
        'uploadable_id',
        'uploadable_type',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // protected $casts = [];
    // protected $with = [];
    protected $appends = ['url', 'dir'];
    protected $hidden  = ['linked_module'];

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    */
    public static $types = [
        self::TYPE_PROFILE_PIC,
        self::TYPE_LOGO,
        // Todo: add more types
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        self::observe(UploadObserver::class);

        // static::saving(function (Upload $element) { });
        // static::creating(function (Upload $element) { });
        // static::updating(function (Upload $element) { });
        // static::created(function (Upload $element) { });
        // static::updated(function (Upload $element) { });
        // static::saved(function (Upload $element) { });
        // static::deleting(function (Upload $element) { });
        // static::deleted(function (Upload $element) { });
    }
}
