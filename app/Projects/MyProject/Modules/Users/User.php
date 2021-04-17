<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Group;
use App\Mainframe\Features\Core\Traits\Validable;
use App\Mainframe\Features\Modular\BaseModule\Traits\ModularTrait;
use App\Mainframe\Modules\Users\Traits\UserTrait;
use App\Projects\MyProject\Notifications\Auth\ResetPassword;
use App\Projects\MyProject\Notifications\Auth\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Watson\Rememberable\Rememberable;

class User extends Authenticatable implements MustVerifyEmail, Auditable
{
    use SoftDeletes,
        Rememberable,
        \OwenIt\Auditing\Auditable,
        ModularTrait,
        Validable,
        Notifiable;

    use UserTrait;
    use UserHelper;

    /**
     * Constants
     */
    public const PASSWORD_VALIDATION_RULE = 'required|confirmed|min:6|regex:/[a-zA-Z]/|regex:/[0-9]/';
    public const GROUP_SUPERADMIN         = 1;

    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'users';
    protected $table      = 'users';

    protected $tenantEnabled = true;

    protected $fillable = [
        'uuid',
        'name',
        'email',
        'password',
        'remember_token',
        'api_token',
        'api_token_generated_at',
        'is_tenant_editable',
        'permissions',
        'is_active',
        'name_initial',
        'first_name',
        'last_name',
        'full_name',
        'gender',
        'device_token',
        'address1',
        'address2',
        'city',
        'county',
        'country_id',
        'country_name',
        'zip_code',
        'phone',
        'mobile',
        'first_login_at',
        'last_login_at',
        'auth_token',
        'email_verified_at',
        'email_verification_code',
        'currency',
        'social_account_id',
        'social_account_type',
        'dob',
        'group_ids',
        'is_test',
    ];

    protected $hidden = ['password', 'remember_token',];
    protected $dates  = ['created_at', 'updated_at', 'deleted_at', 'first_login_at', 'last_login_at',];
    protected $casts  = ['group_ids' => 'array',];
    // protected $with = [];
    protected $appends = ['type', 'profile_pic'];

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

    // protected $spreadAttributes = [
    //     'group_ids' => Group::class,
    // ];

    // protected $tagAttributes = [
    //     'first_name',
    //     'group_ids',
    // ];

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
        self::observe(UserObserver::class);

        // static::saving(function (User $element) { });
        // static::creating(function (User $element) { });
        // static::updating(function (User $element) { });
        // static::created(function (User $element) { });
        // static::updated(function (User $element) { });
        static::saved(function (User $element) {
            $element->groups()->sync($element->group_ids);
        });
        // static::deleting(function (User $element) { });
        // static::deleted(function (User $element) { });
    }

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */
    /**
     * Send reset password link
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token)
    {
        // Note: Utilize project asset instead of Mainframe default
        $this->notifyNow(new ResetPassword($token));
    }

    /**
     * Send email verification link.
     */
    public function sendEmailVerificationNotification()
    {
        // Note: Utilize project asset instead of Mainframe default
        $this->notifyNow(new VerifyEmail());
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
    /**
     * User type attribute
     *
     * @return string
     */
    public function getTypeAttribute()
    {
        if ($this->isA('admin')) {
            return 'admin';
        }

        if ($this->isA('user')) {
            return 'user';
        }

        return '-';
    }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    */

}
