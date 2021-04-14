<?php

namespace App\Projects\MyProject\Modules\Settings;

use App\Mainframe\Modules\Settings\Traits\SettingTrait;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

class Setting extends BaseModule
{
    use SettingTrait, SettingHelper;

    protected $moduleName = 'settings';
    protected $table      = 'settings';
    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'title',
        'type',
        'description',
        'value',
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
        self::observe(SettingObserver::class);

        // static::saving(function (Setting $element) { });
        // static::creating(function (Setting $element) { });
        // static::updating(function (Setting $element) { });
        // static::created(function (Setting $element) { });
        // static::updated(function (Setting $element) { });
        // static::saved(function (Setting $element) { });
        // static::deleting(function (Setting $element) { });
        // static::deleted(function (Setting $element) { });
    }

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */
    // public function getUrlAttribute(){return asset($this->path); }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }

}
