<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Mainframe\Features\Mf;
use Watson\Rememberable\Rememberable;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mainframe\Features\Multitenant\GlobalScope\AddTenant;
use App\Mainframe\Features\Modular\BaseModule\Traits\Changeable;
use App\Mainframe\Features\Modular\BaseModule\Traits\Uploadable;
use App\Mainframe\Features\Modular\BaseModule\Traits\Processable;
use App\Mainframe\Features\Modular\BaseModule\Traits\ModularTrait;
use App\Mainframe\Features\Modular\BaseModule\Traits\UpdaterTrait;
use App\Mainframe\Features\Modular\BaseModule\Traits\EventIdentifiable;
use App\Mainframe\Features\Modular\BaseModule\Traits\RelatedUsersTrait;
use App\Mainframe\Features\Modular\BaseModule\Traits\TenantContextTrait;

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
class BaseModule extends Model
{
    use SoftDeletes, Rememberable, Processable, EventIdentifiable,
        RelatedUsersTrait, TenantContextTrait, UpdaterTrait,
        Uploadable, Changeable, ModularTrait;

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

        if (user()->ofTenant()) {
            static::addGlobalScope(new AddTenant);
        }
    }

    /**
     * Auto fill some of the generic model fields.
     */
    public function autoFill()
    {
        // Inject tenant context.
        $this->autoFillTenant();

        $this->uuid = $this->uuid ?? uuid();
        $this->created_by = $this->created_by ?? user()->id;
        $this->created_at = $this->created_at ?? now();
        $this->updated_by = $this->updated_by ?? user()->id;
        $this->updated_at = now();
    }

    /**
     * Fill tenant id once during creation. Later tenant id can not be
     * updated.
     */
    public function autoFillTenant()
    {
        if (user()->ofTenant() && $this->hasTenantContext()) {
            $this->tenant_id = $this->tenant_id ?: user()->tenant_id;
        }
    }

    /**
     * Check if a model has a given attribute
     *
     * @param $attribute
     * @return bool
     */
    public function hasAttribute($attribute)
    {
        return array_key_exists($attribute, $this->getAttributes()());
    }

    /**
     * Check if a model table has a given column
     *
     * @param $column
     * @return bool
     */
    public function hasColumn($column)
    {
        return in_array($column, $this->tableColumns());
    }

    /**
     * Get all the table columns of the model
     *
     * @return array
     */
    public function tableColumns()
    {
        return Mf::tableColumns($this->getTable());
    }

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    public function scopeActive($query) { return $query->where('is_active', 1); }


    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string  $key
     * @param  mixed  $value
     * @return mixed
     */
    // protected function castAttribute($key, $value)
    // {
    //     if ($this->getCastType($key) === 'array' && $value === [null]) {
    //         return [];
    //     }
    //
    //     return parent::castAttribute($key, $value);
    // }
}
