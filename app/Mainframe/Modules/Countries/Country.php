<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Countries;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;

/**
 * App\Mainframe\Modules\Countries\Country
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $code
 * @property string|null $country_id
 * @property string|null $iso2
 * @property string|null $country_short_name
 * @property string|null $country_long_name
 * @property string|null $iso3
 * @property string|null $numcode
 * @property string|null $un_member
 * @property string|null $calling_code
 * @property string|null $cctld
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $currency
 * @property string|null $currency_symbol
 * @property string|null $currency_override
 * @property string|null $currency_override_symbol
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCallingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCctld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCountryLongName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCountryShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCurrencyOverride($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCurrencyOverrideSymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereCurrencySymbol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereIso2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereIso3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereNumcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereUnMember($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Countries\Country whereUuid($value)
 * @mixin \Eloquent
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 */
class Country extends BaseModule
{
    use CountryHelper;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'countries';
    protected $table      = 'countries';

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
        self::observe(CountryObserver::class);
        static::saving(function (Country $element) { });
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
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function creator() { return $this->belongsTo(\App\User::class, 'created_by'); }

    /*
   |--------------------------------------------------------------------------
   | Todo: Helper functions
   |--------------------------------------------------------------------------
   | Todo: Write Helper functions in the CountryHelper trait.
   */

}
