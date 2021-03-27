<?php

namespace App\Mainframe\Modules\Packages\Traits;

use App\Mainframe\Modules\Packages\Package;
use App\Mainframe\Modules\Packages\PackageProcessor;

trait PackageProcessorTrait
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
     * @param  \App\Mainframe\Modules\Packages\Package  $package
     * @return $this
     */
    public function fill($package)
    {
        parent::fill($package);

        // $package->name = 'Lorem Ipsum';

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
     * Validation rules.
     *
     * @param  \App\Mainframe\Modules\Packages\Package  $package
     * @param  array  $merge
     * @return array
     */
    public static function rules($package, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:packages,name,'.(isset($package->id) ? (string) $package->id : 'null').',id,deleted_at,NULL',
            'is_active' => 'in:1,0',
        ];

        return array_merge($rules, $merge);
    }

    /**
     * Custom error messages.
     *
     * @param  array  $merge
     * @return array
     */
    public static function customErrorMessages($merge = [])
    {
        $messages = [];

        return array_merge($messages, $merge);
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
     * @param  Package  $package
     * @return $this
     */
    public function saving($package)
    {

        return $this;
    }

    // /**
    //  * Creating validation
    //  *
    //  * @param $package \App\Mainframe\Modules\Superheroes\Package
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function creating($package)
    // {
    //     return parent::creating($package); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Updating validation
    //  *
    //  * @param $package \App\Mainframe\Modules\Superheroes\Package
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function updating($package)
    // {
    //     return parent::updating($package); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  *  Deleting validation
    //  *
    //  * @param $package \App\Mainframe\Modules\Superheroes\Package
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function deleting($package)
    // {
    //     return parent::deleting($package); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Restoring validation
    //  *
    //  * @param $package \App\Mainframe\Modules\Superheroes\Package
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function restoring($package)
    // {
    //     return parent::restoring($package); // TODO: Change the autogenerated stub
    // }

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    |
    | All validation must be checked through some function. All validation
    | functions are listed below.
    */

}