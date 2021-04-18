<?php

namespace App\Mainframe\Modules\Contents;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Contents\Traits\ContentTrait;

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
