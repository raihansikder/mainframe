<?php

namespace App\Mainframe\Modules\Comments;

use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Features\Modular\Validator\ModelProcessor;

class CommentProcessor extends ModelProcessor
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
     * @param  \App\Mainframe\Modules\Comments\Comment  $comment
     * @return $this
     */
    public function fill($comment)
    {
        parent::fill($comment);

        $comment->is_active = 1;

        $module = null;
        if (isset($comment->element_id)) {
            $module = Module::find($comment->module_id);
        }

        $element = null;
        if ($module && isset($comment->element_id)) {
            /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $model */
            $model = $module->model;
            $element = $model::find($comment->element_id);
        }

        if ($module) {
            $comment->commentable_type = trim($module->model, '\\');
        }

        if ($element) {
            $comment->commentable_id = $element->id;
            $comment->element_uuid = $element->uuid;
        }

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
     * @param  \App\Mainframe\Modules\Comments\Comment  $comment
     * @param  array  $merge
     * @return array
     */
    public static function rules($comment, $merge = [])
    {
        $rules = [
            'body' => 'required|between:1,512',
        ];

        return array_merge($rules, $merge);
    }

    /**
     * Custom error messages.
     *
     * @param  array  $merge
     * @return array
     */
    // public static function customErrorMessages($merge = [])
    // {
    //     $messages = [];
    //
    //     return array_merge($messages, $merge);
    // }

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
     * @param  Comment  $comment
     * @return $this
     */
    public function saving($comment)
    {
        parent::saving($comment);
        /*
        |--------------------------------------------------------------------------
        | Call validation functions one by one.
        |--------------------------------------------------------------------------
        |
        | A list of functions that will be called sequentially to validate the model
        */
        $this->nameIsNotJoker($comment);
        // $this->valueIsNotPrime($comment);
        // $this->hasEnoughGunsToFight($comment);
        // $this->heroIsNotInHospital($comment);

        return $this;
    }

    // /**
    //  * Creating validation
    //  *
    //  * @param Comment $comment
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function creating($comment)
    // {
    //     return parent::creating($comment); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Updating validation
    //  *
    //  * @param Comment $comment
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function updating($comment)
    // {
    //     return parent::updating($comment); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  *  Deleting validation
    //  *
    //  * @param Comment $comment
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function deleting($comment)
    // {
    //     return parent::deleting($comment); // TODO: Change the autogenerated stub
    // }
    //
    // /**
    //  * Restoring validation
    //  *
    //  * @param Comment $comment
    //  * @return \App\Mainframe\Features\Modular\Validator\ModelValidator|\App\Mainframe\Modules\Settings\SettingValidator
    //  */
    // public function restoring($comment)
    // {
    //     return parent::restoring($comment); // TODO: Change the autogenerated stub
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
     * Validate the name. Name should not be 'Joker'
     *
     * @param  Comment  $comment
     * @return $this
     */
    private function nameIsNotJoker($comment)
    {
        if ($comment->name == 'Joker') {
            $this->fieldError('name', "Name can not be Joker");
        }

        return $this;
    }
}