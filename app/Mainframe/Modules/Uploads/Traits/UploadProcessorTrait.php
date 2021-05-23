<?php

namespace App\Mainframe\Modules\Uploads\Traits;

use App\Upload;

trait UploadProcessorTrait
{
    /*
    |--------------------------------------------------------------------------
    | Validation
    |--------------------------------------------------------------------------
    */
    /**
     * Fill the model with values. This is helpful when a model has additional
     * fields that is not filled through mass assignment but needs to be
     * filled so that the data is locally available. Often in the
     * case of id-name pair id will be filled by mass assignment
     * but the name needs to be auto filled in this method.
     *
     * @param $upload \App\Upload|mixed
     * @return $this
     */
    public function fill($upload)
    {
        $upload->is_active = 1; // Always set as active

        return $this;
    }

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param  Upload  $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            // 'type' => 'in:'.implode(',', Upload::$types),
        ];

        return array_merge($rules, $merge);
    }

    /*
    |--------------------------------------------------------------------------
    | Execute calculations, validations and actions on different events
    |--------------------------------------------------------------------------
    */

}