<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Changes;

use App\Mainframe\Helpers\Modular\BaseModule\BaseModule;

/**
 * App\Mainframe\Modules\Changes\Change
 *
 * @property int $id TRIAL
 * @property string|null $uuid TRIAL
 * @property int|null $tenant_id TRIAL
 * @property string|null $name TRIAL
 * @property string|null $change_set TRIAL
 * @property int|null $module_id TRIAL
 * @property string|null $module_name TRIAL
 * @property int|null $element_id TRIAL
 * @property string|null $element_uuid TRIAL
 * @property string|null $field TRIAL
 * @property string|null $old TRIAL
 * @property string|null $new TRIAL
 * @property string|null $description TRIAL
 * @property int|null $is_active TRIAL
 * @property int|null $created_by TRIAL
 * @property int|null $updated_by TRIAL
 * @property \Illuminate\Support\Carbon|null $created_at TRIAL
 * @property \Illuminate\Support\Carbon|null $updated_at TRIAL
 * @property \Illuminate\Support\Carbon|null $deleted_at TRIAL
 * @property int|null $deleted_by TRIAL
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Mainframe\Modules\Users\User|null $creator
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\Mainframe\Modules\Users\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Helpers\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereChangeSet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereModuleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Changes\Change whereUuid($value)
 * @mixin \Eloquent
 */
class Change extends BaseModule
{
    use ChangeHelper;
    /*
    |--------------------------------------------------------------------------
    | Fillable attributes
    |--------------------------------------------------------------------------
    |
    | These attributes can be mass assigned
    */
    protected $fillable = [
        'uuid',
        'tenant_id',
        'name',
        'change_set',
        'module_id',
        'module_name',
        'element_id',
        'element_uuid',
        'field',
        'old',
        'new',
        'description',
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
    // protected $casts = [];

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
        self::observe(ChangeObserver::class);
        static::saving(function (Change $element) {
            $element->is_active = true;
        });
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
   | Todo: Write Helper functions in the ChangeHelper trait.
   */

}
