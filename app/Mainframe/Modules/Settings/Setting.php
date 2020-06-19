<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Settings;

use Illuminate\Database\Eloquent\Builder;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;

/**
 * Class Setting
 *
 * @property int $id TRIAL
 * @property string|null $uuid TRIAL
 * @property string|null $name TRIAL
 * @property string|null $title TRIAL
 * @property string|null $type TRIAL
 * @property string|null $description TRIAL
 * @property string|null $value TRIAL
 * @property int|null $is_active TRIAL
 * @property int|null $created_by TRIAL
 * @property int|null $updated_by TRIAL
 * @property \Illuminate\Support\Carbon|null $created_at TRIAL
 * @property \Illuminate\Support\Carbon|null $updated_at TRIAL
 * @property \Illuminate\Support\Carbon|null $deleted_at TRIAL
 * @property int|null $deleted_by TRIAL
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereCreatedBy($value)
 * @method static Builder|Setting whereDeletedAt($value)
 * @method static Builder|Setting whereDeletedBy($value)
 * @method static Builder|Setting whereDescription($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereIsActive($value)
 * @method static Builder|Setting whereName($value)
 * @method static Builder|Setting whereTitle($value)
 * @method static Builder|Setting whereType($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereUpdatedBy($value)
 * @method static Builder|Setting whereUuid($value)
 * @method static Builder|Setting whereValue($value)
 * @mixin \Eloquent
 * @method static Builder|BaseModule active()
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant $tenant
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Mainframe\Modules\Comments\Comment $latestComment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 */
class Setting extends BaseModule
{
    use SettingHelper;

    // protected $forceDeleting = false;

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
    | Options
    |--------------------------------------------------------------------------
    |
    | Your model can have one or more public static variables that stores
    | The possible options for some field. Variable name should be
    |
    */
    /**
     * @var array Options for setting type
     */
    public static $types = [
        'boolean' => 'Boolean',
        'string'  => 'String',
        'array'   => 'Array',
        'file'    => 'File',
    ];

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
        self::observe(SettingObserver::class);

        static::saving(function (Setting $element) {
            // $element->error('message1');
            // $element->error('message2','key1');
            // $element->error('message3');
            // return false;
            // $element->messageBag()->add('messages', 'message2');
            // $element->messageBag()->add('messages', 'message3');
            // $element->messageBag()->add('messages', 'message4');
        });
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
    // public function updater() { return $this->belongsTo(\App\User::class, 'updated_by'); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function creator() { return $this->belongsTo(\App\User::class, 'created_by'); }

    /*
   |--------------------------------------------------------------------------
   | Todo: Helper functions
   |--------------------------------------------------------------------------
   | Todo: Write Helper functions in the SettingHelper trait.
   */

}
