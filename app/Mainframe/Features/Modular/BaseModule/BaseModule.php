<?php

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Features\Core\Traits\Validable;
use App\Mainframe\Features\Modular\BaseModule\Traits\ModularTrait;
use App\Mainframe\Features\Multitenant\GlobalScope\CheckTenantScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Query\Builder;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Models\Audit;
use Watson\Rememberable\Rememberable;

/**
 * Class BaseModule
 *
 * @package App
 * @property int $id
 * @property string|null $uuid
 * @property int|null $tenant_id
 * @property string|null $name
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $deleted_by
 * @method static bool|null forceDelete()
 * @method static Model|Builder|mixed remember($param)
 * @property-read \Illuminate\Database\Eloquent\Collection|\OwenIt\Auditing\Models\Audit[] $audits
 * @property-read int|null $audits_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Comment[] $comments
 * @property-read int|null $comments_count
 * @property-read \App\User $creator
 * @property-read \App\Project $project
 * @property-read \App\Tenant $tenant
 * @property-read \App\User $updater
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read int|null $uploads_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule active()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Mainframe\Features\Modular\BaseModule\BaseModule withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Mainframe\Modules\Changes\Change[] $changes
 * @property-read int|null $changes_count
 * @property-read \App\Module $linkedModule
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Spread[] $spreads
 * @property-read int|null $spreads_count
 */
class BaseModule extends Model implements Auditable
{
    /*
    |--------------------------------------------------------------------------
    | Include Mainframe module traits
    |--------------------------------------------------------------------------
    */
    use SoftDeletes,                // Laravel default trait to enable soft delete
        Rememberable,               // Third party plugin to cache model query
        \OwenIt\Auditing\Auditable, // 3rd party audit log
        ModularTrait,               // Mainframe modular features.
        Validable                   // Allow validation
        ;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    */
    protected $moduleName = 'projects'; // Note: demo module name to create ide-helper doc block

    /**
     * Enable tenant context
     *
     * @var bool
     */
    protected $tenantEnabled = false;

    /**
     * Date fields
     *
     * @var string[]
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    protected $hidden = ['project_id', 'tenant_id', 'deleted_by', 'deleted_at'];

    /**
     * Attributes to exclude from the Audit.
     *
     * @var array
     */
    protected $auditExclude = ['updated_at',];

    /**
     * Define the spread attribute mapping that link to a another model.
     * Note: Table field must follow *_model_ids, i.e. visited_country_ids, active_group_ids
     *
     * @var array
     */
    protected $spreadAttributes = [
        // 'group_ids' => Group::class,
    ];

    /**
     * Define the tag attributes of the model that will be saved in spreads table.
     *
     * @var array
     */
    protected $tagAttributes = [
        // 'first_name',
        // 'group_ids',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot method and model events.
    |--------------------------------------------------------------------------
    */
    protected static function boot()
    {
        parent::boot();

        // Skip audit log if there is no change
        Audit::creating(function (Audit $model) {
            if (empty($model->old_values) && empty($model->new_values)) {
                return false;
            }
        });

        // Add tenant scope to model if current user() belongs to a tenant
        if (user()->ofTenant()) {
            static::addGlobalScope(new CheckTenantScope);
        }
    }
}
