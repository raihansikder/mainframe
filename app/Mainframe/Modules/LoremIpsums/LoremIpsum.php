<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\LoremIpsums;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;

/**
 * App\Mainframe\Modules\LoremIpsums\LoremIpsum
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $hidden
 * @property string|null $textarea
 * @property string|null $textarea_ckeditor
 * @property string|null $tags
 * @property string|null $text
 * @property string|null $select_array
 * @property array|null $select_array_multiple
 * @property int|null $dolor_sit_id
 * @property array|null $dolor_sit_ids
 * @property int|null $parent_id
 * @property int|null $checkbox
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Mainframe\Modules\Users\User|null $creator
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\Mainframe\Modules\Users\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereCheckbox($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereDolorSitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereDolorSitIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereSelectArray($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereSelectArrayMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereTextarea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereTextareaCkeditor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereUuid($value)
 * @mixin \Eloquent
 * @property int|null $mf_project_id
 * @property-read \App\Mainframe\Modules\MfProjects\MfProject $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\LoremIpsums\LoremIpsum whereMfProjectId($value)
 */
class LoremIpsum extends BaseModule
{
    use LoremIpsumHelper;
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
        'hidden',
        'tags',
        'textarea',
        'textarea_ckeditor',
        'text',
        'select_array',
        'select_array_multiple',
        'dolor_sit_id',
        'dolor_sit_ids',
        'parent_id',
        'checkbox',
        'is_active',
    ];

    /*
    |--------------------------------------------------------------------------
    | Guarded attributes
    |--------------------------------------------------------------------------
    |
    | The attributes can not be mass assigned.
    */
    // protected $guarded = [];

    /*
    |--------------------------------------------------------------------------
    | Type cast dates
    |--------------------------------------------------------------------------
    |
    | Type cast attributes as date. This allows to create a Carbon object.
    | Of the dates
   */
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | Type cast attributes
    |--------------------------------------------------------------------------
    |
    | Type cast attributes (helpful for JSON)
    */
    protected $casts = [
        'select_array_multiple' => 'array',
        'dolor_sit_ids' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Automatic eager load
    |--------------------------------------------------------------------------
    |
    | Auto load these relations whenever the model is retrieved.
    */
    // protected $with = [];

    /*
    |--------------------------------------------------------------------------
    | Append new attributes to the model
    |--------------------------------------------------------------------------
    |
    | If you want to append a new attribute that doesn't exists in the table
    | you should first create and accessor getNewFieldAttribute and then
    | add the attribute name in the array
    */
    // protected $appends = [];

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | Your model can have one or more public static variables that stores
    | The possible options for some field. Variable name should be
    |
    */
    // public static $types = [];
    // public static $statuses = [];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    |
    | Register the observer in the boot method. You can also make use of
    | model events like saving, creating, updating etc to further
    | manipulate the model
    */
    public static function boot()
    {
        parent::boot();
        self::observe(LoremIpsumObserver::class);
        static::saving(function (LoremIpsum $element) { });
    }

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    //public function scopePopular($query) { return $query->where('votes', '>', 100); }
    //public function scopeWomen($query) { return $query->whereGender('W'); }
    /*
    Usage: $users = User::popular()->women()->orderBy('created_at')->get();
    */

    //public function scopeOfType($query, $type) { return $query->whereType($type); }
    /*
    Usage:  $users = User::ofType('member')->get();
    */

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function getFirstNameAttribute($value) { return ucfirst($value); }

    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    |
    | If you want to add extra fields(that doesn't exist in database) to you model
    | you can use the getSomeAttribute() feature of eloquent.
    */
    // public function getUrlAttribute(){return asset($this->path); }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    |
    | Write model relations (belongsTo,hasMany etc) at the bottom the file
    */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function updater() { return $this->belongsTo(\App\Mainframe\Modules\Users\User::class, 'updated_by'); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function creator() { return $this->belongsTo(\App\Mainframe\Modules\Users\User::class, 'created_by'); }

    /*
   |--------------------------------------------------------------------------
   | Todo: Helper functions
   |--------------------------------------------------------------------------
   | Todo: Write Helper functions in the LoremIpsumHelper trait.
   */

}
