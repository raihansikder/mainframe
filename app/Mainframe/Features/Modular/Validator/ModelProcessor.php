<?php
/** @noinspection PhpUnusedParameterInspection */

/** @noinspection SelfClassReferencingInspection */

namespace App\Mainframe\Features\Modular\Validator;

use App\Mainframe\Features\Core\Traits\HasMessageBag;
use App\Mainframe\Features\Core\Traits\Validable;
use Validator;

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
     * An array that has the original value of the element.
     * Field names are array keys.
     *
     * @var array
     */
    public $original;

    /**
     * Fields that can not be changed once created.
     *
     * @var array
     */
    public $unMutable = [];

    /**
     * Define the allowed strict value change of specific fields
     *
     * @var array
     */
    public $transitions = [
        'status' => [
            'Lorem' => ['Ipsum', 'Dolor']
        ]
    ];

    /**
     * MainframeModelValidator constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     */
    public function __construct($element)
    {
        $this->element = $element;
        $this->original = $element->getOriginal();
    }

    /**
     * Fill the model with values. This is helpful when a model has additional
     * fields that is not filled through mass assignment but needs to be
     * filled so that the data is locally available. Often in the
     * case of id-name pair id will be filled by mass assignment
     * but the name needs to be auto filled in this method.
     *
     * @param $element \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed
     * @return $this
     */
    public function fill($element)
    {
        return $this;
    }

    /**
     * Laravel validator validation rules.
     *
     * @param  mixed $element
     * @param  array $merge
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
     * Custom error messages for the validation rules above.
     *
     * @param  array $merge
     * @return array
     */
    public static function customErrorMessages($merge = [])
    {
        $messages = [];

        return array_merge($messages, $merge);
    }

    /**
     * Run Laravel validation
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
     * Invalidate if the value of an un-mutable field has been changed.
     *
     * @return $this
     */
    public function checkUnMutable()
    {
        foreach ($this->getUnMutable() as $field) {
            if ($this->element->fieldHasChanged($field)) {
                $this->fieldError($field, $field.' - can not be updated.');
            }
        }

        return $this;
    }

    /**
     * Checks if all the transitions are valid.
     *
     * @return $this
     */
    public function checkTransitions()
    {
        $allTransitions = $this->getTransitions();

        foreach ($allTransitions as $field => $transition) {
            if ($this->element->fieldHasChanged($field)) {

                $change = $this->element->transition($field);

                if ($change && ! $this->transitionAllowed($field, $change['old'], $change['new'])) {
                    $this->fieldError($field, $field.' - can not be updated from '.$change['old'].' to '.$change['new']);
                }

            }
        }

        return $this;
    }

    /**
     * Check if a value transition is allowed.
     *
     * @param $field
     * @param $from
     * @param $to
     * @return bool
     */
    public function transitionAllowed($field, $from, $to)
    {
        $allTransitions = $this->getTransitions();

        if (! isset($allTransitions[$field])) {
            return true;
        }

        if (! isset($allTransitions[$field][$from])) {
            return true;
        }

        $transitions = $allTransitions[$field][$from];
        if (in_array($to, $transitions)) {
            return true;
        }

        return false;
    }

    /**
     * Get a list of un-mutable fields
     *
     * @return array
     */
    public function getUnMutable()
    {
        return $this->unMutable;
    }

    /**
     * Get a list of un-mutable fields
     *
     * @return array
     */
    public function getTransitions()
    {
        return $this->transitions;
    }

    /**
     * Get the original value. If not original value exists return null
     *
     * @param $key
     * @return mixed
     */
    public function original($key)
    {
        return $this->original[$key] ?? null;
    }

    /**
     * Generic function to process all validation logic. This function auto
     * determines whether it should call the creating() or updating()
     * logic based on existence of id field in the element.
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
    | Model events where validation is checked. This events refer to intentions.
    | If you are attempting to save a model in some place of your application
    | Then you should call the save() processor function.
    */

    /**
     * Run validation for save. Common for create and update.
     *
     * @param  null $element
     * @return $this
     */
    public function save($element = null)
    {
        $element = $element ?: $this->element;
        $this->fill($element)->validate();

        if ($this->valid()) {
            $this->saving($element);
        }

        return $this;
    }

    /**
     * Run validation for create. This initially runs the save()
     * validation checks then loads creating() checks.
     *
     * @param  null $element
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
     * @param  null $element
     * @return $this
     */
    public function update($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->checkUnMutable();
        $this->checkTransitions();
        $this->updating($element);

        return $this;
    }

    /**
     * Run validation for delete.
     *
     * @param  null $element
     * @return $this
     */
    public function delete($element = null)
    {
        $element = $element ?: $this->element;
        $element->deleted_by = user()->id; // Fill with the deleter id.
        $this->deleting($element);

        return $this;
    }

    /**
     * Run validation for restore.
     *
     * @param  null $element
     * @return $this
     */
    public function restore($element = null)
    {
        $element = $element ?: $this->element;
        $this->save();
        $this->restoring($element);

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
     * Saved validation.
     * Common for both create and update.
     *
     * @param $element
     * @return $this
     */
    public function created($element)
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
     * Updating validation
     *
     * @param $element
     * @return $this]
     */
    public function updated($element)
    {
        return $this;
    }

    /**
     * Saved validation.
     * Common for both create and update.
     *
     * @param $element
     * @return $this
     */
    public function saved($element)
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
     * Deleting validation
     *
     * @param $element
     * @return $this]
     */
    public function deleted($element)
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

    /**
     * Restoring validation
     *
     * @param $element
     * @return $this]
     */
    public function restored($element)
    {
        return $this;
    }
}