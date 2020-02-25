<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Features\Modular\BaseModule;

use OwenIt\Auditing\Models\Audit;
use Watson\Rememberable\Rememberable;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Mainframe\Features\Multitenant\GlobalScope\AddTenant;
use App\Mainframe\Features\Modular\BaseModule\Traits\Uploadable;
use App\Mainframe\Features\Modular\BaseModule\Traits\Processable;
use App\Mainframe\Features\Modular\BaseModule\Traits\Commentable;
use App\Mainframe\Features\Modular\BaseModule\Traits\ModularTrait;
use App\Mainframe\Features\Modular\BaseModule\Traits\UpdaterTrait;
use App\Mainframe\Features\Modular\BaseModule\Traits\ModelAutoFill;
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
class BaseModule extends Model implements Auditable
{
    use SoftDeletes, Rememberable;
    use \OwenIt\Auditing\Auditable;

    use Processable, EventIdentifiable,
        RelatedUsersTrait, TenantContextTrait, UpdaterTrait,
        Uploadable, Commentable, ModularTrait, ModelAutoFill;

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

        /**
         * Do not store audit logs if there is no change.
         */
        Audit::creating(function (Audit $model) {
            if (empty($model->old_values) && empty($model->new_values)) {
                return false;
            }
        });

        /**
         * For tenant user add global scope.
         */
        if (user()->ofTenant()) {
            static::addGlobalScope(new AddTenant);
        }
    }

    /**
     * Check if value has changed
     *
     * @param $field
     * @return bool
     */
    public function fieldHasChanged($field)
    {
        if (array_key_exists($field, $this->getChanges())) {
            return true; // This only works inside boot::saved()
        }

        if (($this->isUpdating() && isset($this->$field)) && $this->getOriginal($field) != $this->$field) {
            return true;
        }

        return false;
    }

    /**
     * Get old and new value of a changed field field
     *
     * @param $field
     * @return array
     */
    public function transition($field)
    {
        if ($this->fieldHasChanged($field)) {
            return ['field' => $field, 'old' => $this->getOriginal($field), 'new' => $this->$field];
        }

        return null;
    }

    /**
     * Check if a certain transition took place.
     *
     * @param $field
     * @param $from
     * @param $to
     * @return bool
     */
    public function hasTransition($field, $from, $to)
    {
        if (! is_array($from)) {
            $from = [$from];
        }

        if (! is_array($to)) {
            $to = [$to];
        }

        $change = $this->transition($field);

        if ($change) {
            return in_array($change['old'], $from) && in_array($change['new'], $to);
        }
    }

    /**
     * Check if a certain transition took place.
     *
     * @param $field
     * @param $from
     * @return bool
     */
    public function hasTransitionFrom($field, $from)
    {

        if (! is_array($from)) {
            $from = [$from];
        }

        $change = $this->transition($field);

        if ($change) {
            return in_array($change['old'], $from);
        }
    }

    /**
     * Check if a certain transition took place.
     *
     * @param $field
     * @param $to
     * @return bool
     */
    public function hasTransitionTo($field, $to)
    {

        if (! is_array($to)) {
            $to = [$to];
        }

        $change = $this->transition($field);

        if ($change) {
            return in_array($change['new'], $to);
        }
    }

}
