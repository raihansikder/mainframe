<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Comments\Traits\CommentTrait;

class Comment extends BaseModule
{
    use CommentTrait;

    protected $moduleName = 'comments';
    protected $table      = 'comments';

    /*
    |--------------------------------------------------------------------------
    | Fillable attributes
    |--------------------------------------------------------------------------
    |
    | These attributes can be mass assigned
    */
    protected $fillable = [
        'uuid',
        'name',
        'type',
        'body',
        'module_id',
        'element_id',
        'element_uuid',
        'commentable_id',
        'commentable_type',
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
        self::observe(CommentObserver::class);

        // static::saving(function (SuperHero $element) { });
        // static::creating(function (SuperHero $element) { });
        // static::updating(function (SuperHero $element) { });
        // static::created(function (SuperHero $element) { });
        // static::updated(function (SuperHero $element) { });
        // static::saved(function (SuperHero $element) { });
        // static::deleting(function (SuperHero $element) { });
        // static::deleted(function (SuperHero $element) { });
    }

}
