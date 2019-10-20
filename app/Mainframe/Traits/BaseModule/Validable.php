<?php

namespace App\Mainframe\Traits\BaseModule;

trait Validable
{
    /**
     * @param $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            // 'name' => 'required|between:1,255|unique:superheros,name' . (isset($element->id) ? ",$element->id" : ''),
            // 'created_by' => 'integer|exists:users,id,is_active,1',
            // 'updated_by' => 'integer|exists:users,id,is_active,1',
            // 'is_active'  => 'required|in:0,1',
            // 'tenant_id'  => 'required|tenants,id,is_active,1',
            // 'status'     => 'in:' . implode(',', self::$statuses),
        ];

        return array_merge($rules, $merge);
    }
}