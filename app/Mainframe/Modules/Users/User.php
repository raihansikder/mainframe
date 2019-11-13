<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Users;

use App\Group;
use InvalidArgumentException;
use Watson\Rememberable\Rememberable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Mainframe\Modules\Users\Traits\UserGroupable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\Validable;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\Changeable;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\Uploadable;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\UpdaterTrait;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\ModularTrait;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\EventIdentifiable;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\RelatedUsersTrait;
use App\Mainframe\Helpers\Modular\BaseModule\Traits\TenantContextTrait;

/**
 * App\Mainframe\Modules\Users\User
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property int $email_confirmed
 * @property string|null $email_confirmed_at
 * @property string|null $email_confirmation_code
 * @property string|null $access_token
 * @property string|null $access_token_generated_at
 * @property string|null $api_token
 * @property string|null $api_token_generated_at
 * @property int $tenant_editable
 * @property array $permissions
 * @property string|null $group_ids_csv
 * @property string|null $group_titles_csv
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property string|null $name_initial
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $full_name
 * @property string|null $gender
 * @property string|null $device_token
 * @property string|null $address1
 * @property string|null $address2
 * @property string|null $city
 * @property string|null $county
 * @property int|null $country_id
 * @property string|null $country_name
 * @property string|null $zip_code
 * @property string|null $phone
 * @property string|null $mobile
 * @property \Illuminate\Support\Carbon|null $first_login_at
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $auth_token
 * @property string|null $email_verified_at
 * @property string|null $last_active_time
 * @property string|null $last_login_time
 * @property string|null $last_logout_time
 * @property string|null $partner_uuid
 * @property string|null $currency
 * @property string|null $social_account_id
 * @property string|null $social_account_type
 * @property string|null $dob
 * @property string|null $group_ids
 * @property int|null $is_test
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Mainframe\Modules\Users\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Group[] $groups
 * @property-read int|null $groups_count
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\Mainframe\Modules\Users\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Modules\Users\User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereAccessToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereAccessTokenGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereAddress1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereAddress2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereApiToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereApiTokenGeneratedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereAuthToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereCounty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereDeviceToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereEmailConfirmationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereEmailConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereEmailConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereFirstLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereGroupIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereGroupIdsCsv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereGroupTitlesCsv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereIsTest($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereLastActiveTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereLastLoginTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereLastLogoutTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereNameInitial($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User wherePartnerUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User wherePermissions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereSocialAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereSocialAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereTenantEditable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Users\User whereZipCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Modules\Users\User withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Modules\Users\User withoutTrashed()
 * @mixin \Eloquent
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use UserHelper, UserGroupable;
    use SoftDeletes, Rememberable, Validable, EventIdentifiable,
        RelatedUsersTrait, TenantContextTrait, UpdaterTrait,
        Uploadable, Changeable, ModularTrait;
    /*
    |--------------------------------------------------------------------------
    | Fillable attributes
    |--------------------------------------------------------------------------
    |
    | These attributes can be mass assigned
    */
    protected $fillable = [
        'uuid', 'tenant_id', 'name', 'email', 'password', 'remember_token', 'api_token', 'api_token_generated_at', 'is_tenant_editable', 'permissions',
        'is_active', 'created_by', 'updated_by', 'created_at', 'updated_at', 'deleted_at', 'deleted_by', 'name_initial', 'first_name', 'last_name', 'full_name',
        'gender', 'device_token', 'address1', 'address2', 'city', 'county', 'country_id', 'country_name', 'zip_code', 'phone', 'mobile', 'first_login_at',
        'last_login_at', 'auth_token', 'email_verified_at', 'email_verification_code', 'currency', 'social_account_id', 'social_account_type', 'dob',
        'group_ids', 'is_test',

    ];

    /*
    |--------------------------------------------------------------------------
    | Guarded attributes
    |--------------------------------------------------------------------------
    |
    | The attributes can not be mass assigned.
    */
    // protected $guarded = [];
    protected $hidden = ['password', 'remember_token',];

    /*
    |--------------------------------------------------------------------------
    | Type cast dates
    |--------------------------------------------------------------------------
    |
    | Type cast attributes as date. This allows to create a Carbon object.
    | Of the dates
   */
    protected $dates = ['created_at', 'updated_at', 'deleted_at', 'first_login_at', 'last_login_at',];

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
    protected $with = ['groups'];

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
    /**
     * Allowed permissions values.
     * Possible options:
     *   -1 => Deny (adds to array, but denies regardless of user's group).
     *    0 => Remove.
     *    1 => Add.
     *
     * @var array
     */
    protected $allowedPermissionsValues = [-1, 0, 1];

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
        self::observe(UserObserver::class);
        static::saving(function (User $element) {
            $valid = true;
            if (! isset($element->is_test)) {
                $element->is_test = 0;
            }
            $element = $element->resolveName();

            /**************************************************
             * Resolve group_id
             * If $user->group_id is set as an array somehow then convert it to json
             * Store a groups in a temporary array var $groups.
             */

            if (is_array($element->group_ids)) {
                $group_ids = $element->group_ids;
                $element->group_ids = json_encode($element->group_ids);
            } else {
                $group_ids = json_decode($element->group_ids);
            }

            // Set group selection limit
            $max_groups = 1;
            if (is_array($group_ids) && (count($group_ids) > $max_groups)) {
                $valid = setError("You can assign only {$max_groups} group.");
            }

            /**************************************************/

            // fill common fields, null-fill, trim blanks from Request
            if ($valid) {
                /**
                 * If email is confirmed then
                 */
                if (! isset($element->is_active)) {
                    $element->is_active = ($element->email_confirmed === 1) ? 1 : 0;
                }
            }

            return $valid;
        });
        static::saved(function (User $element) {
            // Sync partner_category table
            $element->groups()->sync(json_decode($element->group_ids));
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups() { return $this->belongsToMany(Group::class, 'user_group'); }

    /*
   |--------------------------------------------------------------------------
   | Todo: Helper functions
   |--------------------------------------------------------------------------
   | Todo: Write Helper functions in the UserHelper trait.
   */

    /**
     * Mutator for taking permissions.
     *
     * @param  array  $permissions
     * @return string
     */
    public function setPermissionsAttribute(array $permissions)
    {
        // Merge permissions
        /** @noinspection PhpParamsInspection */
        $permissions = array_merge($this->permissions, $permissions);

        // Loop through and adjust permissions as needed
        foreach ($permissions as $permission => &$value) {
            // Lets make sure there is a valid permission value
            if (! in_array($value = (int) $value, $this->allowedPermissionsValues)) {
                throw new InvalidArgumentException("Invalid value [$value] for permission [$permission] given.");
            }

            // If the value is 0, delete it
            if ($value === 0) {
                unset($permissions[$permission]);
            }
        }

        $this->attributes['permissions'] = (! empty($permissions)) ? json_encode($permissions) : '';
    }

    /**
     * Mutator for giving permissions.
     *
     * @param  mixed  $permissions
     * @return array  $_permissions
     */
    public function getPermissionsAttribute($permissions)
    {
        if (! $permissions) {
            return [];
        }

        if (is_array($permissions)) {
            return $permissions;
        }

        if (! $_permissions = json_decode($permissions, true)) {
            throw new InvalidArgumentException("Cannot JSON decode permissions [$permissions].");
        }

        return $_permissions;
    }

}
