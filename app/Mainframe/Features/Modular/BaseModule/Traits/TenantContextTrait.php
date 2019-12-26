<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use Cache;
use Schema;

/** @mixin $this BaseModule */
trait TenantContextTrait
{
    /**
     * Checks if a user has tenant context
     *
     * @return bool
     * @internal param $name
     */
    public function hasTenantContext()
    {
        $table = $this->getTable();

        return Cache::remember("db-{$table}-fields", cacheTime('long'),
            function () use ($table) {
                if (Schema::hasColumn($table, 'tenant_id')) {
                    return user()->tenant_id;
                }

                return false;
            });

        /*if (array_key_exists('tenant_id', $this->getAttributes())) {
            return user()->tenant_id;
        }*/
        // return false;
    }
}