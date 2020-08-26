<?php 

namespace App\Projects\MyProject\Modules\Uploads;

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
 * @property-read \App\Projects\MyProject\Modules\Uploads\Upload|null $uploadable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Uploads\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereUploadableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Projects\MyProject\Modules\Uploads\Upload
 *     whereUuid($value)
 * @mixin \Eloquent
 * @property-read \App\Mainframe\Modules\Modules\Module|null $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 */
class Upload extends \App\Mainframe\Modules\Uploads\Upload
{
    use UploadHelper;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'uploads';
    protected $table = 'uploads';

    /*
    |--------------------------------------------------------------------------
    | Fillable attributes
    |--------------------------------------------------------------------------
    |
    | These attributes can be mass assigned
    */
    // protected $fillable = [
    //     'uuid',
    //     'name',
    //     'is_active',
    // ];

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
    public static $types = ['profile-pic', 'product-photo', 'logo', 'balance-sheet', 'certificate-of-incorporation', 'VAT-registration-certificate', 'company-letter-headed-paper','uploaded-order','mph-agreement','reseller-agreement','realwear-nda','external-agreement'];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    |
    | Register the observer in the boot method. You can also make use of
    | model events like saving, creating, updating etc to further
    | manipulate the model
    */
    public static function boot() {
        parent::boot();
        self::observe(UploadObserver::class);
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
