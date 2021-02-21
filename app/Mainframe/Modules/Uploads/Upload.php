<?php

namespace App\Mainframe\Modules\Uploads;

use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Modules\Uploads\Traits\UploadTrait;

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
    use UploadTrait;

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

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    */
    public static $types = [
        self::TYPE_PROFILE_PIC,
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
            if ($element->type == 'profile-pic') {
                $element->deletePreviousOfSameType();
            }
        });
    }
}
