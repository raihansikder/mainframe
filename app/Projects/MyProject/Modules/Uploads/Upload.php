<?php

namespace App\Projects\MyProject\Modules\Uploads;

use App\Mainframe\Modules\Uploads\Traits\UploadTrait;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

class Upload extends BaseModule
{
    use UploadTrait, UploadHelper;

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
    | Option values
    |--------------------------------------------------------------------------
    */
    public static $types = [
        self::TYPE_PROFILE_PIC,
        self::TYPE_LOGO,
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
            $element->fillModuleAndElement();
            $element->fillExtension();
        });
        // static::creating(function (Upload $element) { });
        // static::updating(function (Upload $element) { });
        // static::created(function (Upload $element) { });
        // static::updated(function (Upload $element) { });
        static::saved(function (Upload $element) {
            if (in_array($element->type, ['profile-pic', 'logo'])) {
                $element->deletePreviousOfSameType();
            }
        });
        // static::deleting(function (Upload $element) { });
        // static::deleted(function (Upload $element) { });
    }

    /*
    |--------------------------------------------------------------------------
    | Section: Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Section: Accessors
    |--------------------------------------------------------------------------
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Section: Mutators
    |--------------------------------------------------------------------------
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Section: Attributes
    |--------------------------------------------------------------------------
    */
    // public function getUrlAttribute(){return asset($this->path); }

    /*
    |--------------------------------------------------------------------------
    | Section: Relations
    |--------------------------------------------------------------------------
    */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }

}
