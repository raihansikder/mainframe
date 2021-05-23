<?php

namespace App\Mainframe\Modules\Settings\Traits;

use App\Setting;

trait SettingProcessorTrait
{
    /*
    |--------------------------------------------------------------------------
    | Fill model .
    |--------------------------------------------------------------------------
    |
    | Sometimes you need to automatically fill some fields of a model based
    | on known logic. For example: if you can take first_name and last_name
    | of an user and auto fill full_name.
    */

    /**
     * Fill the model with values
     *
     * @param  \App\Setting  $setting
     * @return $this
     */
    public function fill($setting)
    {
        // $this->addMessage('Fill in trait custom');

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Rules.
    |--------------------------------------------------------------------------
    |
    | Write the laravel validation rules
    */

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param  \App\Setting  $setting
     * @param  array  $merge
     * @return array
     */
    public static function rules($setting, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:settings,name,'.(isset($setting->id) ? (string) $setting->id : 'null').',id,deleted_at,NULL',
            'title' => 'required|between:1,255',
            'type' => 'required|'.'in:'.implode(',', array_keys(Setting::$types)),
            'desc' => 'between:1,2048',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /*
    |--------------------------------------------------------------------------
    | Execute validation on module events
    |--------------------------------------------------------------------------
    |
    | Check validations on saving, creating, updating, deleting and restoring
    */

    /**
     * Run validations for saving. This should be common for both creating and updating.
     *
     * @param $setting \App\Setting
     * @return $this
     */
    public function saving($setting)
    {
        $this->valueCompatibleWithType($setting);

        return $this;
    }

    /**
     * Run validations for creating. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    // public function creating()
    // {
    //     return parent::creating(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for updating. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    // public function updating()
    // {
    //     return parent::updating(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for deleting.
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    // public function deleting()
    // {
    //     return parent::deleting(); // TODO: Change the autogenerated stub
    // }

    /**
     * Run validations for restoring. This should always call the saving().
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|\App\Mainframe\Modules\Settings\SettingProcessor
     */
    // public function restoring()
    // {
    //     return parent::restoring(); // TODO: Change the autogenerated stub
    // }

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    |
    | All validation must be checked through some function. All validation
    | functions are listed below.
    */

    /**
     * Check if type matches with value
     *
     * @param $setting
     * @return $this
     */
    private function valueCompatibleWithType($setting)
    {

        if (($setting->type == 'boolean') && ! in_array($setting->value, ['true', 'false'])) {
            $this->fieldError('value', "If boolean type is selected, value must be 'true' or 'false'");
        }

        if (($setting->type == 'array') && ! json_decode($setting->value)) {
            $this->fieldError('value', "If array/json type is selected, value must be a valid json string");
        }

        // $this->addErrorMessage('Message Added $this->addError');
        // $this->addMessage('Message Added $this->addMessage');
        // $this->addWarning('Message Added $this->addWarning');
        // $this->addDebug('Message Added $this->addDebug');

        return $this;
    }
}