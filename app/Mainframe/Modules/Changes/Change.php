<?php

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Changes\Traits\ChangeTrait;

class Change extends BaseModule
{
    use ChangeTrait;

    protected $moduleName = 'changes';
    protected $table      = 'changes';

    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'changeable_id',
        'changeable_type',
        'module_id',
        'element_id',
        'element_uuid',
        'field',
        'old',
        'new',
        'note',
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
    // public static $types = [];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        self::observe(ChangeObserver::class);
        // static::saving(function (Change $element) { });
        // static::creating(function (Change $element) { });
        // static::updating(function (Change $element) { });
        // static::created(function (Change $element) { });
        // static::updated(function (Change $element) { });
        // static::saved(function (Change $element) { });
        // static::deleting(function (Change $element) { });
        // static::deleted(function (Change $element) { });
    }

}
