<?php

namespace App\Mainframe\Modules\Settings\Validation;

use App\Mainframe\Modules\Settings\Setting;
use App\Mainframe\Features\Validator\ModelValidator;

class SettingValidator extends ModelValidator
{

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:modules,name,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'title' => 'required|between:1,255',
            'type' => 'required|'.'in:'.implode(',', array_keys(Setting::$types)),
            'desc' => 'between:1,2048',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    public function saving()
    {
        parent::saving();
        $this->matchTypeValue();

        return $this;
    }

    private function matchTypeValue()
    {

        $setting = $this->element;

        if ($setting->type === 'boolean') {
            if (! in_array($setting->value, ['true', 'false'])) {
                $this->addError('value', "If boolean type is selected, value must be 'true' or 'false'");
            }
        }

        if ($setting->type === 'array') {
            if (! json_decode($setting->value)) {
                $this->addError('value', "If array/json type is selected, value must be a valid json string");
            }
        }

    }
}