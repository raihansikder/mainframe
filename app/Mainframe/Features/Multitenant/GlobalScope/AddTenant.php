<?php

namespace App\Mainframe\Features\Multitenant\GlobalScope;

use App\Mainframe\Helpers\Mf;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class AddTenant implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        if (Mf::tableHasColumn($model->getTable(), 'tenant_id')) {
            $builder->where('tenant_id', user()->tenant_id);
        }
    }
}