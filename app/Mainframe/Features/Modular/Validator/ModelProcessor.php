<?php
/** @noinspection PhpUnusedParameterInspection */

/** @noinspection SelfClassReferencingInspection */

namespace App\Mainframe\Features\Modular\Validator;

use Validator;
use App\Mainframe\Features\Core\Traits\Validable;
use App\Mainframe\Features\Core\Traits\HasMessageBag;

class ModelProcessor
{
    use Validable, HasMessageBag;

    /**
     * Element filled with new values
     *
     * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public $element;

    /**
     * Element with previous value
     *
     * @var array|mixed
     */
    public $original;

    /**
     * Fields that can not be changed.
     *
     * @var array
     */
    public $unMutableFields = [];

    /**
     * MainframeModelValidator constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     */
    public function __construct($element)
    {
        $this->element = $element;
        $this->original = $element->getOriginal();
    }

    /**
     * Fill the model with values
     *
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed
     * @return $this
     */
    public function fill($element)
    {
        return $this;
    }

    /**
     * Validation rules.
     *
     * @param  mixed  $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:modules,name,'
                .(isset($element->id) ? (string) $element->id : 'null')
                .',id,deleted_at,NULL',
            'is_active' => 'required|in:1,0',
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

    /**
     * Validate based on rules
     *
     * @return \Illuminate\Contracts\Validation\Validator|\Illuminate\Validation\Validator
     */
    public function validate()
    {
        $this->validator = Validator::make(
            $this->element->getAttributes(),
            $this::rules($this->element),
            $this::customErrorMessages()
        );

        return $this->validator;
    }

    /**
     * Run validation logic on model.
     * Based on existence of id field decide to check creating()/updating()
     *
     * @return $this
     */
    public function run()
    {
        if (isset($this->element->id)) {
            return $this->update();
        }

        return $this->create();
    }

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    | Model events where validation is checked.
    */

    /**
     * Run validation for save.
     *
     * @param  null  $element
     * @return $this
     */
    public function save($element = null)
    {
        $element = $element ?: $this->element;
        $this->fill($element)->validate();
        $this->saving($element);

        return $this;
    }

    /**
     * Run validation for create.
     *
     * @param  null  $element
     * @return $this
     */
    public function create($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->creating($element);

        return $this;
    }

    /**
     * Run validation for update.
     *
     * @param  null  $element
     * @return $this
     */
    public function update($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->updating($element);

        return $this;
    }

    /**
     * Run validation for delete.
     *
     * @param  null  $element
     * @return $this
     */
    public function delete($element = null)
    {
        $element = $element ?: $this->element;
        $this->deleting($element);

        return $this;
    }

    /**
     * Run validation for restore.
     *
     * @param  null  $element
     * @return $this
     */
    public function restore($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->restoring($element);

        return $this;
    }

    /**
     * Invalidate if an un-mutable field has been updated
     *
     * @return $this
     */
    public function checkUnMutable()
    {

        foreach ($this->unMutableFields as $field) {
            if ($this->original[$field] != $this->element->$field) {
                $this->addfieldError($field, "This field can not be updated.");
            }
        }

        return $this;
    }


    /*
    |--------------------------------------------------------------------------
    | Event specific validation
    |--------------------------------------------------------------------------
    |
    | Following functions are overridden in model validators to write
    | event specific validation logic.
    */

    /**
     * Saving validation.
     * Common for both create and update.
     *
     * @param $element
     * @return $this
     */
    public function saving($element)
    {
        $this->checkUnMutable();

        return $this;
    }

    /**
     * Creating validation
     *
     * @param $element
     * @return $this]
     */
    public function creating($element)
    {
        return $this;
    }

    /**
     * Updating validation
     *
     * @param $element
     * @return $this]
     */
    public function updating($element)
    {
        return $this;
    }

    /**
     * Deleting validation
     *
     * @param $element
     * @return $this]
     */
    public function deleting($element)
    {
        return $this;
    }

    /**
     * Restoring validation
     *
     * @param $element
     * @return $this]
     */
    public function restoring($element)
    {
        return $this;
    }

}