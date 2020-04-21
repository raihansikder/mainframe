<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Features\Modular\Rememberable\Rememberable;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mainframe\Features\Multitenant\GlobalScope\AddTenant;
use App\Mainframe\Features\Modular\BaseModule\Traits\ModularTrait;

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
 * @method static Model|Builder remember($param)
 */
class BaseModule extends Model implements Auditable
{
    /*
    |--------------------------------------------------------------------------
    | Include mainframe module traits
    |--------------------------------------------------------------------------
    |
    */
    use SoftDeletes,                // Laravel default trait to enable soft delete
        Rememberable,               // Third party plugin to cache model query
        \OwenIt\Auditing\Auditable, // 3rd party audit log
        ModularTrait                // Mainframe modular features.

        // Processable,
        // EventsTrait,
        // RelatedUsersTrait,
        // TenantContextTrait,
        // UpdaterTrait,
        // Uploadable,
        // Commentable,
        // ModelAutoFill
        ;

    /*
    |--------------------------------------------------------------------------
    | Module definitions
    |--------------------------------------------------------------------------
    |
    */
    protected $moduleName;

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

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

        /*
        |--------------------------------------------------------------------------
        | Skip audit log store if no change
        |--------------------------------------------------------------------------
        |
        */
        Audit::creating(function (Audit $model) {
            if (empty($model->old_values) && empty($model->new_values)) {
                return false;
            }
        });

        /*
        |--------------------------------------------------------------------------
        | Add tenant scope to model if current user() belongs to a tenant
        |--------------------------------------------------------------------------
        |
        */
        if (user()->ofTenant()) {
            static::addGlobalScope(new AddTenant);
        }
    }

}
