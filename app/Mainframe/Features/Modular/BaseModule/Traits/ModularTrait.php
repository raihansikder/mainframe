<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Helpers\Mf;
use App\Mainframe\Modules\Modules\Module;

/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this */
trait ModularTrait
{
    /**
     * Get the module object that an element belongs to. If the element is $tenant then the function
     * returns the row from modules table that has module name 'tenants'.
     *
     * @return Module
     */
    public function module()
    {
        return Module::where('name', $this->moduleName)
            ->remember(timer('very-long'))->first();
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