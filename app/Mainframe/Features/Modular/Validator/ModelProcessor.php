<?php
/** @noinspection PhpUnusedParameterInspection */

/** @noinspection SelfClassReferencingInspection */

namespace App\Mainframe\Features\Modular\Validator;

use App\Mainframe\Features\Core\Traits\Validable;
use App\Module;
use App\User;
use Illuminate\Support\Str;
use Validator;

class ModelProcessor
{
    use Validable;

    /**
     * Element filled with new values
     * Values: create, update, delete, restore
     *
     * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public $event;

    /** @var Module */
    public $module;

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
     * Old element filled with old values
     *
     * @var \App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public $oldElement;

    /**
     * Fields that can not be changed once created.
     *
     * @var array
     */
    public $immutables = [];

    /**
     * Define the allowed strict value change of specific fields
     *
     * @var array
     */
    public $transitions = [
        // 'status' => [
        //     'Lorem' => ['Ipsum', 'Dolor'],
        // ],
    ];

    /** @var array Field that should be explicitly tracked in the changes table */
    public $trackedFields = [];

    /** @var User */
    public $user;

    /**
     * MainframeModelValidator constructor.
     *
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule  $element
     */
    public function __construct($element)
    {
        $this->user = user();
        if ($element->isUpdating()) {
            $this->oldElement = (clone $element)->refresh();
        }
        $this->element = $element;
        $this->original = $element->getOriginal();
        $this->module = $element->module();
    }

    /**
     * @param  array  $immutables
     * @return ModelProcessor|mixed|$this
     */
    public function addImmutables($immutables = [])
    {
        $this->immutables = array_unique(array_merge($this->immutables, $immutables));

        return $this;
    }

    public function setEvent($event)
    {
        $this->event = $event;
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
     * Custom error messages for the validation rules above.
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
     * Custom attributes for the validation rules above.
     *
     * @param  array  $merge
     * @return array
     */
    public static function customAttributes($merge = [])
    {
        $attributes = [];

        return array_merge($attributes, $merge);
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
            $this::customErrorMessages(),
            $this::customAttributes()
        );

        return $this->validator;
    }

    /**
     * Merge validation error to MessageBag
     *
     * @return $this
     */
    public function sendToMessageBag()
    {
        $msg = 'Operation Failed';
        if ($this->event == 'create') {
            $msg = 'Failed to create new '.Str::singular($this->module->title);
        }
        if ($this->event == 'update') {
            $msg = 'Failed to update '.Str::singular($this->module->title.' ('.$this->element->id.')');
        }
        if ($this->event == 'delete') {
            $msg = 'Failed to delete '.Str::singular($this->module->title.' ('.$this->element->id.')');
        }

        $this->addErrorMessage($msg);
        $this->addValidatorErrors($this->validator);

        return $this;
    }

    /**
     * Invalidate if the value of an un-mutable field has been changed.
     *
     * @return $this
     */
    public function validateImmutables()
    {
        foreach ($this->getImmutables() as $field) {
            if ($this->element->fieldHasChanged($field)) {
                // $this->fieldError($field, 'Value of '.$field.' can not be changed at this stage.');
                $original = $this->original($field);
                $updated = $this->element->$field;

                if (is_array($original)) {
                    $original = json_encode($original);
                }
                if (is_array($updated)) {
                    $updated = json_encode($updated);
                }

                if ($original == $updated) {
                    return $this;
                }

                $this->fieldError($field,
                    "Value of {$field} can not be changed {$original} > {$updated} at this stage [{$this->module->title}#{$this->element->id}]");
            }
        }

        return $this;
    }

    /**
     * Checks if all the transitions are valid.
     *
     * @return $this
     */
    public function validateTransitions()
    {
        $allTransitions = $this->getTransitions();

        foreach ($allTransitions as $field => $transition) {
            if ($this->element->fieldHasChanged($field)) {

                $change = $this->element->transition($field);

                if ($change && !$this->transitionIsAllowed($field, $change['old'], $change['new'])) {
                    $this->fieldError($field, $field.' - can not be updated from '.$change['old'].' to '.$change['new']);
                }
            }
        }

        return $this;
    }

    /**
     * Check if a field has been just created some value. This function is useful
     * inside processor saved()
     *
     * @param $field
     * @param $value
     * @return bool
     */
    public function justCreatedWith($field, $value)
    {
        if ($this->event !== 'create') {
            return false;
        }

        if ($this->element->$field == $value) {
            return true;
        }

        return false;
    }

    /**
     * Get old and new value of a changed field field
     *
     * @param $field
     * @return array
     */
    public function transitionOf($field)
    {
        // Previous $this->element->fieldHasChanged($field)
        if ($this->fieldHasChanged($field)) {
            return ['field' => $field, 'old' => $this->original($field), 'new' => $this->element->$field];
        }

        return null;
    }

    /**
     * @param $field
     * @return array|null
     */
    public function fieldChange($field)
    {
        return $this->transitionOf($field);
    }

    /**
     * Check if a field has change
     *
     * @param $fields
     * @return bool
     */
    public function fieldHasChanged($fields)
    {
        if (!is_array($fields)) {
            $fields = [$fields];
        }

        if (!$this->element->isUpdating()) {
            return false;
        }

        foreach ($fields as $field) {

            // if(!isset($this->original($field), $this->element->$field)){
            //     return false;
            // }

            if ($this->original($field) != $this->element->$field) {
                return true;
            }
        }

        return false;
    }

    /**
     * Check if any of the fields have changed.
     *
     * @param  array  $fields
     * @return bool
     */
    public function anyFieldHasChanged($fields = [])
    {
        return $this->fieldHasChanged($fields);
    }

    /**
     * Check if all the fields have changed
     *
     * @param  array  $fields
     * @return bool
     */
    public function allFieldsHavChanged($fields = [])
    {
        foreach ($fields as $field) {
            if (!$this->fieldHasChanged($field)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Check if a certain transition took place.
     *
     * @param $field
     * @param $from
     * @param $to
     * @return bool
     */
    public function hasTransition($field, $from, $to)
    {
        if (!is_array($from)) {
            $from = [$from];
        }

        if (!is_array($to)) {
            $to = [$to];
        }

        $change = $this->transitionOf($field);

        if ($change) {
            return in_array($change['old'], $from) && in_array($change['new'], $to);
        }
    }

    /**
     * Check if a certain transition took place.
     *
     * @param $field
     * @param $from
     * @return bool
     */
    public function hasTransitionFrom($field, $from)
    {

        if (!is_array($from)) {
            $from = [$from];
        }

        $change = $this->transitionOf($field);

        if ($change) {
            return in_array($change['old'], $from);
        }
    }

    /**
     * Check if a certain transition took place.
     *
     * @param $field
     * @param $to
     * @return bool
     */
    public function hasTransitionTo($field, $to)
    {

        if (!is_array($to)) {
            $to = [$to];
        }

        $change = $this->transitionOf($field);

        if ($change) {
            return in_array($change['new'], $to);
        }
    }

    /**
     * Check if a value transition is allowed.
     *
     * @param $field
     * @param $from
     * @param $to
     * @return bool
     */
    public function transitionIsAllowed($field, $from, $to)
    {
        $allTransitions = $this->getTransitions();

        if (!isset($allTransitions[$field])) {
            return true;
        }

        if (!isset($allTransitions[$field][$from])) {
            return true;
        }

        $transitions = $allTransitions[$field][$from];

        if (!is_array($transitions)) {
            $transitions = [$transitions];
        }

        return in_array('*', $transitions) || in_array($to, $transitions);
    }

    /**
     * Get an array of allowed next transition values
     *
     * @param $field
     * @param  null  $from
     * @return array
     */
    public function allowedTransitionsOf($field, $from = null)
    {
        $from = $from ?: $this->original($field);
        $allTransitions = $this->getTransitions();

        if (isset($allTransitions[$field][$from])) {

            return array_merge($allTransitions[$field][$from], [$from]); // Merge the same item
        }

        return [$from];
    }

    /**
     * Check if a number of existing relations exists in database.
     *
     * @param  array  $relations
     * @return $this
     */
    public function checkExistingRelations($relations = [])
    {

        foreach ($relations as $relation) {
            $this->checkExistingRelation($relation);
        }

        return $this;

    }

    /**
     * Check if individual relation exists in database.
     *
     * @param $relation
     * @param  int  $limit
     * @param  null  $msg
     * @return $this
     */
    public function checkExistingRelation($relation, $limit = 10, $msg = null)
    {

        $msg = $msg ?? ' related '.str_replace('_', ' ', Str::snake($relation)).' found';

        $relation = $this->element->$relation();
        $existingCount = $relation->count();
        if (!$existingCount) {
            return $this;
        }

        $sampleIds = $relation->limit($limit)->pluck('id')->toArray();

        $fullMsg = $existingCount.$msg.'. Id '.implode(', ', $sampleIds);

        if ($existingCount > $limit) {
            $fullMsg .= ' ... and more.';
        }

        $this->error($fullMsg);

        return $this;
    }

    /**
     * Get a list of un-mutable fields
     *
     * @return array
     * @depricated use immutables()
     */
    public function getImmutables()
    {
        return $this->immutables();
    }

    /**
     * Define the immutables in an array and return.
     *
     * @return array
     */
    public function immutables()
    {
        return array_unique($this->immutables);
    }

    /**
     * Define the allowed transitions in array and return
     *
     * @return array
     */
    public function transitions()
    {
        return $this->transitions;
    }

    /**
     * Get a list of un-mutable fields
     *
     * @return array
     * @deprecated user transitions
     */
    public function getTransitions()
    {
        return $this->transitions();
    }

    public function getTrackedFields()
    {
        return array_merge($this->trackedFields, array_keys($this->transitions));
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
        return $this->forSave();
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
     * Run processor for save.
     *
     * @param  null  $element
     * @return $this
     */
    public function forSave($element = null)
    {
        $element = $element ?: $this->element;

        $this->fill($element)->validate();

        if (!$this->isValid()) {
            return $this;
        }

        $this->preSaving();
        $this->saving($element);

        if ($element->isCreating()) {
            $this->preCreating();

            return $this->creating($element);
        }

        if ($element->isUpdating()) {
            $this->preUpdating();

            return $this->updating($element);
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function preSaving()
    {
        return $this;
    }

    /**
     * Save the element
     */
    public function save()
    {
        // echo 'In Processor Save() ';

        $this->event = $this->element->isCreating() ? 'create' : 'update';

        // Run validation, call saving, then call creating/updating
        $this->forSave();

        if (!$this->isValid()) {
            $this->sendToMessageBag();

            return $this;
        }

        // If validation passes then attempt model save.
        if (!$this->element->save()) {
            $this->error('Error: Can not be saved for some reason.');

            return $this;
        }

        // Call created() if this save() function is called during a create operation.
        if ($this->event == 'create') {
            $this->created($this->element);
        }

        // Call updated() if this save() function is called during a create operation.
        if ($this->event == 'update') {
            $this->updated($this->element);
        }

        $this->saved($this->element);

        return $this;
    }

    /**
     * Save the element
     */
    public function saveQuietly()
    {
        if ($this->forSave()->isValid()) {
            $this->element->saveQuietly();
        }

        return $this;
    }

    /**
     * Run validation for create. This initially runs the save()
     * validation checks then loads creating() checks.
     *
     * @param  null  $element
     * @return $this
     */
    // public function forCreate($element = null)
    // {
    //     $element = $element ?: $this->element;
    //
    //     $this->fill($element)->validate();
    //
    //     $this->saving($element);
    //     $this->preCreating();
    //     $this->creating($element);
    //
    //     return $this;
    // }

    /**
     * Run common codes before update.
     *
     * @return $this
     */
    public function preCreating()
    {
        // $this->checkImmutables(); // Example
        // $this->checkTransitions(); // Example

        return $this;
    }

    /**
     * Create the element
     */
    // public function create()
    // {
    //     if ($this->forCreate()->valid()) {
    //         $this->element->save();
    //     }
    //
    //     return $this;
    // }

    /**
     * Run validation for update.
     *
     * @param  null  $element
     * @return $this
     */
    // public function forUpdate($element = null)
    // {
    //     $element = $element ?: $this->element;
    //     $this->fill($element)->validate();
    //
    //     $this->saving($element);
    //     $this->preUpdating();
    //     $this->updating($element);
    //
    //     return $this;
    // }

    /**
     * Run common codes before update.
     *
     * @return $this
     */
    public function preUpdating()
    {
        $this->validateImmutables();
        $this->validateTransitions();

        return $this;
    }

    /**
     * Create the element
     */
    // public function update()
    // {
    //     if ($this->forUpdate()->valid()) {
    //         $this->element->save();
    //     }
    //
    //     return $this;
    // }

    /**
     * Run validation for delete.
     *
     * @param  null  $element
     * @return $this
     */
    public function forDelete($element = null)
    {
        $element = $element ?: $this->element;
        $element->deleted_by = user()->id; // Fill with the deleter id.
        $this->preDeleting();
        $this->deleting($element);

        return $this;
    }

    /**
     * Run common codes before delete
     */
    public function preDeleting()
    {

    }

    /**
     * Create the element
     *
     * @throws \Exception
     */
    public function delete()
    {
        // echo 'In Processor delete() ';
        $this->event = 'delete';

        $this->forDelete();

        if (!$this->isValid()) {
            $this->sendToMessageBag();

            return $this;

        }

        $this->element->saveQuietly(); // Set deleted by field

        if (!$this->element->delete()) {
            $this->error('Error: Can not be deleted for some reason.');

            return $this;
        }

        $this->deleted($this->element);

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

        $this->event = 'restore';
        $this->forSave();
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
        // echo 'In Processor saving(). ';

        return $this;
    }

    /**
     * Creating validation
     *
     * @param $element
     * @return $this
     */
    public function creating($element)
    {
        // echo 'In Processor creating(). ';

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
        // echo 'In Processor created(). ';

        return $this;
    }

    /**
     * Updating validation
     *
     * @param $element
     * @return $this
     */
    public function updating($element)
    {
        // echo 'In Processor updating(). ';

        return $this;
    }

    /**
     * Updating validation
     *
     * @param $element
     * @return $this
     */
    public function updated($element)
    {
        // echo 'In Processor updated(). ';

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
        // echo 'In Processor saved(). ';

        return $this;
    }

    /**
     * Deleting validation
     *
     * @param $element
     * @return $this
     */
    public function deleting($element)
    {
        // echo 'In Processor deleting(). ';

        return $this;
    }

    /**
     * Deleting validation
     *
     * @param $element
     * @return $this
     */
    public function deleted($element)
    {
        // echo 'In Processor deleted(). ';

        return $this;
    }

    /**
     * Restoring validation
     *
     * @param $element
     * @return $this
     */
    public function restoring($element)
    {
        // echo 'In Processor restoring(). ';

        return $this;
    }

    /**
     * Restoring validation
     *
     * @param $element
     * @return $this
     */
    public function restored($element)
    {
        // echo 'In Processor restored(). ';

        return $this;
    }
}