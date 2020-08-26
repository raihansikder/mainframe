<?php

namespace App\Mainframe\Modules\Groups;

use Request;
use App\User;
use InvalidArgumentException;
use Illuminate\Database\Eloquent\Builder;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Groups\Traits\GroupDefinitionsTrait;

/**
 * App\Mainframe\Modules\Groups\Group
 *
 * @property int $id
 * @property string|null $uuid
 * @property string|null $name
 * @property string|null $title
 * @property array $permissions
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read int|null $changes_count
 * @property-read \App\User|null $creator
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\User|null $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $users
 * @property-read int|null $users_count
 * @method static Builder|BaseModule active()
 * @method static Builder|Group newModelQuery()
 * @method static Builder|Group newQuery()
 * @method static Builder|Group query()
 * @method static Builder|Group whereCreatedAt($value)
 * @method static Builder|Group whereCreatedBy($value)
 * @method static Builder|Group whereDeletedAt($value)
 * @method static Builder|Group whereDeletedBy($value)
 * @method static Builder|Group whereId($value)
 * @method static Builder|Group whereIsActive($value)
 * @method static Builder|Group whereName($value)
 * @method static Builder|Group wherePermissions($value)
 * @method static Builder|Group whereTitle($value)
 * @method static Builder|Group whereUpdatedAt($value)
 * @method static Builder|Group whereUpdatedBy($value)
 * @method static Builder|Group whereUuid($value)
 * @mixin \Eloquent
 * @property int|null $tenant_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Groups\Group whereTenantId($value)
 * @property int|null $project_id
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Groups\Group whereProjectId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Mainframe\Modules\Comments\Comment $latestComment
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 */
class Group extends BaseModule
{
    use GroupHelper, GroupDefinitionsTrait;
    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'groups';
    protected $table      = 'groups';

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
    /**
     * Allowed permissions values.
     * Possible options:
     *    0 => Remove.
     *    1 => Add.
     *
     * @var array
     */
    protected $allowedPermissionsValues = [0, 1];

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
        self::observe(GroupObserver::class);
        static::saving(function (Group $element) {
            $permissions = [];
            // revoke existing group permissions
            $existing_permissions = $element->getPermissions();
            if (count($existing_permissions)) {
                foreach ($existing_permissions as $k => $v) {
                    $permissions[$k] = 0;
                }
            }

            // include new group permissions from form input
            if (Request::has('permission') && is_array(Request::get('permission'))) {
                foreach (Request::get('permission') as $k) {
                    $permissions[$k] = 1;
                }
            }

            $element->permissions = $permissions;
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

    /**
     * Accessor for giving permissions.
     *
     * @param  mixed  $permissions
     * @return array
     * @throws \InvalidArgumentException
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


    /*
    |--------------------------------------------------------------------------
    | Mutators
    |--------------------------------------------------------------------------
    |
    | Eloquent provides a convenient way to transform your model attributes when
    | getting or setting them. Get a transformed value of an attribute
    */
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }
    /**
     * Mutator for taking permissions.
     *
     * @param  array  $permissions
     * @return void
     * @throws \InvalidArgumentException
     */
    public function setPermissionsAttribute(array $permissions)
    {
        // Merge permissions
        $permissions = array_merge($this->getPermissions(), $permissions);

        // Loop through and adjust permissions as needed
        foreach ($permissions as $permission => &$value) {
            // Lets make sure their is a valid permission value
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
    public function users() { return $this->belongsToMany(User::class, 'user_group'); }

    /*
   |--------------------------------------------------------------------------
   | Todo: Helper functions
   |--------------------------------------------------------------------------
   | Todo: Write Helper functions in the GroupHelper trait.
   */

}
