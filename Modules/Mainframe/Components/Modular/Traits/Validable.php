<?php

namespace Modules\Mainframe\Components\Modular\Traits;

use Validator;

/**
 * @property  array $custom_validation_messages
 */
trait Validable
{
    /**
     * Custom validation messages.
     *
     * @var array
     */
    public static $custom_validation_messages = [
        //'name.required' => 'Custom message.',
    ];

    /**
     * Return a set of validation rules
     *
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

    public static function customMessages($element, $merge = [])
    {
        $custom_validation_messages = [
            //'name.required' => 'Custom message.',
        ];

        return array_merge($custom_validation_messages, $merge);
    }

    /**
     * This function validates a model based on the validation rule.
     * Also checks if it isCreatable/isEditable
     *
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validateModel()
    {
        /** @var \Modules\Mainframe\Components\Modular\BaseModule $this */
        return Validator::make(
            $this->attributes, static::rules($this),
            static::customMessages($this)
        );

    }

}
