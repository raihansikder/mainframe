<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Modules\Module;

/**
 * App\Mainframe\Modules\Uploads\Upload
 *
 * @property int $id TRIAL
 * @property string|null $uuid TRIAL
 * @property int|null $tenant_id TRIAL
 * @property string|null $name TRIAL
 * @property string|null $type TRIAL
 * @property string|null $path TRIAL
 * @property int|null $order TRIAL
 * @property string|null $ext TRIAL
 * @property int|null $bytes TRIAL
 * @property string|null $description TRIAL
 * @property int|null $module_id TRIAL
 * @property int|null $element_id TRIAL
 * @property string|null $element_uuid TRIAL
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereExt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereUuid($value)
 * @mixin \Eloquent
 * @property string|null $uploadable_type
 * @property int|null $uploadable_id
 * @property-read mixed $dir
 * @property-read mixed $url
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereUploadableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereUploadableType($value)
 * @property int|null $project_id
 * @property-read \App\Mainframe\Modules\Projects\Project $project
 * @property-read \App\Mainframe\Modules\Tenants\Tenant|null $tenant
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Modules\Uploads\Upload whereProjectId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \App\Mainframe\Modules\Uploads\Upload|null $uploadable
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Comments\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\Mainframe\Modules\Comments\Comment $latestComment
 * @property-read \App\Mainframe\Modules\Modules\Module|null $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 */
class Upload extends BaseModule
{
    use UploadHelper;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName = 'uploads';
    protected $table      = 'uploads';
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
    protected $appends = ['url', 'dir'];

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    | Your model can have one or more public static variables that stores
    | The possible options for some field. Variable name should be
    |
    */
    public static $types = ['profile-pic'];

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
        self::observe(UploadObserver::class);

        static::saving(function (Upload $element) {
            $element->fillModuleAndElementData();
            $element->fillExtension();
        });
        static::saved(function (Upload $element) {
            if ($element->type == 'profile-pic') {
                $element->deletePreviousOfSameType();
            }
        });
    }

    /**
     * Fill data to relate this upload with another module element.
     *
     * @return $this
     */
    public function fillModuleAndElementData()
    {

        $module = $this->linkedModule;
        $element = null;

        if ($module) {
            /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $model */
            $model = $module->model;
            $this->uploadable_type = trim($module->model, '\\');
        }

        if ($module && isset($this->element_id)) {
            $element = $model::remember(timer('very-long'))
                ->find($this->element_id);
        }

        if ($element) {
            $this->uploadable_id = $element->id;
            $this->element_uuid = $element->uuid;
        }

        return $this;

    }

    /**
     * Fill extension
     *
     * @return $this
     */
    public function fillExtension()
    {
        $this->ext = extFrmPath($this->path); // Store file extension separately

        return $this;
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
    public function getUrlAttribute() { return asset($this->path); }

    public function getDirAttribute() { return public_path().$this->path; }

    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    |
    | Write model relations (belongsTo,hasMany etc) at the bottom the file
    */
    /**
     * Get the owning commentable model.
     */
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function uploadable() { return $this->morphTo(); }

    /**
     * @return \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed
     */
    public function linkedModule()
    {
        return $this->belongsTo(Module::class, 'module_id')
            ->remember(timer('long'));
    }

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

    /**
     * Deletes the previously uploaded file of the same type.
     * This function is useful for uploading profile pic
     * where there latest pic will discard the last one.
     */
    public function deletePreviousOfSameType()
    {
        if (isset($this->uploadable)) {
            $this->uploadable->uploads()
                ->where('type', $this->type)
                ->where('id', '!=', $this->id)
                ->delete();
        }
    }
}
