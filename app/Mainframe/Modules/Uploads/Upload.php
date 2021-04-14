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
    protected $hidden = ['linked_module'];

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    */
    public static $types = [
        self::TYPE_PROFILE_PIC,
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

        static::saving(function (Upload $element) {
            $element->fillModuleAndElementData();
            $element->fillExtension();
        });

        static::saved(function (Upload $element) {
            if ($element->type == 'profile-pic') {
                $element->deletePreviousOfSameType();
            }
        });
    }
}
