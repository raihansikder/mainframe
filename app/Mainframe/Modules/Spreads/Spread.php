<?php

namespace App\Mainframe\Modules\Spreads;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Spreads\Traits\SpreadTrait;

class Spread extends BaseModule
{
    // Note: Pull in necessary traits from relevant mainframe class
    use SpreadTrait;

    protected $moduleName = 'spreads';
    protected $table      = 'spreads';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'spreadable_type',
        'spreadable_id',
        'module_id',
        'element_id',
        'element_uuid',
        'key',
        'tag',
        'relates_to',
        'related_id',
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
        self::observe(SpreadObserver::class);

        // static::saving(function (Spread $element) { });
        // static::creating(function (Spread $element) { });
        // static::updating(function (Spread $element) { });
        // static::created(function (Spread $element) { });
        // static::updated(function (Spread $element) { });
        // static::saved(function (Spread $element) { });
        // static::deleting(function (Spread $element) { });
        // static::deleted(function (Spread $element) { });
    }

}
