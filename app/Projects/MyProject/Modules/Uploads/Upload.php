<?php

namespace App\Projects\MyProject\Modules\Uploads;

use App\Mainframe\Modules\Uploads\Traits\UploadTrait;
use App\Projects\MyProject\Features\Modular\BaseModule\BaseModule;

/**
 * App\Projects\MyProject\Modules\Uploads\Upload
 *
 * @property int $id
 * @property string|null $uuid
 * @property int|null $project_id
 * @property int|null $tenant_id
 * @property string|null $name
 * @property string|null $type
 * @property string|null $path
 * @property int|null $order
 * @property string|null $ext
 * @property int|null $bytes
 * @property string|null $description
 * @property string|null $uploadable_type
 * @property int|null $uploadable_id
 * @property int|null $module_id
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property int|null $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property int|null $deleted_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User|null $creator
 * @property-read mixed $dir
 * @property-read mixed $url
 * @property-read \App\Mainframe\Modules\Comments\Comment $latestComment
 * @property-read \App\Mainframe\Modules\Uploads\Upload $latestUpload
 * @property-read \App\Mainframe\Modules\Projects\Project|null $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @property-read \App\User|null $updater
 * @property-read Upload|null $uploadable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereUploadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Upload
 *     whereUuid($value)
 * @mixin \Eloquent
 * @property-read \App\Mainframe\Modules\Modules\Module|null $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 */
class Upload extends BaseModule
{
    use UploadTrait, UploadHelper;

    public const TYPE_PROFILE_PIC = 'Profile Picture';
    public const TYPE_LOGO        = 'Logo';

    protected $moduleName = 'uploads';
    protected $table      = 'uploads';

    /*
    |--------------------------------------------------------------------------
    | Properties
    |--------------------------------------------------------------------------
    */
    protected $fillable = [
        'uuid',
        'name',
        'type',
        'path',
        'order',
        'ext',
        'bytes',
        'description',
        'module_id',
        'element_id',
        'element_uuid',
        'uploadable_id',
        'uploadable_type',
        'is_active',
    ];

    // protected $guarded = [];
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    // protected $casts = [];
    // protected $with = [];
    protected $appends = ['url', 'dir'];
    protected $hidden  = ['linked_module'];

    /*
    |--------------------------------------------------------------------------
    | Option values
    |--------------------------------------------------------------------------
    */
    public static $types = [
        self::TYPE_PROFILE_PIC,
        self::TYPE_LOGO,
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();
        self::observe(UploadObserver::class);

        static::saving(function (Upload $element) {
            $element->fillModuleAndElementData();
            $element->fillExtension();
        });

        static::saved(function (Upload $element) {
            if (in_array($element->type, ['profile-pic', 'logo'])) {
                $element->deletePreviousOfSameType();
            }
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
   | Todo: Write Helper functions in the UploadHelper trait.
   */

}
