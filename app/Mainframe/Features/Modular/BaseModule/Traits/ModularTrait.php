<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Helpers\Mf;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Projects\Project;
use App\Mainframe\Modules\Tenants\Tenant;
use App\Mainframe\Modules\Uploads\Upload;
use App\User;
use DB;

/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this */
trait ModularTrait
{
    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    public function scopeActive($query) { return $query->where('is_active', 1); }

    /*
    |--------------------------------------------------------------------------
    | Module features
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Get the module object of element
     *
     * @return Module
     */
    public function module()
    {
        return Module::where('name', $this->moduleName)
            ->remember(timer('very-long'))->first();
    }

    /**
     * Check if a model has a given attribute
     *
     * @param $attribute
     * @return bool
     */
    public function hasAttribute($attribute)
    {
        return array_key_exists($attribute, $this->getAttributes()());
    }

    /**
     * Shorthand function for getAttributeKeysExcept.
     * Gets all attribute names
     *
     * @param array $except
     * @return array|bool|mixed
     */
    public function fields($except = [])
    {
        return $this->getAttributeKeysExcept($except);
    }

    /**
     * Get all attribute names
     *
     * @return array|bool
     */
    public function getAttributeKeys()
    {
        return array_keys($this->getAttributes());
    }

    /**
     * Get attribute except
     *
     * @param  array  $except
     * @return array|bool
     */
    public function getAttributeKeysExcept($except = [])
    {
        return collect($this->getAttributes())->except($except)->keys()->toArray();
    }

    /**
     * Check if a model table has a given column
     *
     * @param $column
     * @return bool
     */
    public function hasColumn($column)
    {
        return in_array($column, $this->tableColumns());
    }

    /**
     * Get all the table columns of the model
     *
     * @return array
     */
    public function tableColumns()
    {
        return Mf::tableColumns($this->getTable());
    }


    /**
     * Cast an attribute to a native PHP type.
     *
     * @param  string $key
     * @param  mixed $value
     * @return mixed
     */
    // protected function castAttribute($key, $value)
    // {
    //     if ($this->getCastType($key) === 'array' && $value === [null]) {
    //         return [];
    //     }
    //
    //     return parent::castAttribute($key, $value);
    // }

    /*
    |--------------------------------------------------------------------------
    | Changes and value transitions
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get latest changes
     * http://www.laravel-auditing.com/docs/9.0/getting-audits
     *
     * @return mixed
     */
    public function lastChanges()
    {
        return $this->audits()->latest()->first()->getModified();
    }

    /**
     * Check if value has changed
     *
     * @param $field
     * @return bool
     */
    public function fieldHasChanged($field)
    {
        if (array_key_exists($field, $this->getChanges())) {
            return true; // This only works inside boot::saved()
        }

        if (($this->isUpdating() && isset($this->$field)) && $this->getOriginal($field) != $this->$field) {
            return true;
        }

        return false;
    }

    /**
     * Get the last updater user of a field
     *
     * @param string $field
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed|null
     */
    public function updaterOfField($field)
    {
        $audits = $this->audits()->latest()->get();

        $userId = null;

        foreach ($audits as $audit) {
            $userId  = $audit->user_id;
            $changes = $audit->getModified();
            if (array_key_exists($field, $changes)) {
                break;
            }
        }

        if ($userId) {
            return User::remember(timer('long'))->find($userId);
        }

        return $this->creator;
    }

    /**
     * Get old and new value of a changed field
     *
     * @param $field
     * @return array
     */
    public function transition($field)
    {
        if ($this->fieldHasChanged($field)) {
            return [
                'field' => $field,
                'old'   => $this->getOriginal($field),
                'new'   => $this->$field,
            ];
        }

        return null;
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
        if (! is_array($from)) {
            $from = [$from];
        }

        if (! is_array($to)) {
            $to = [$to];
        }

        $change = $this->transition($field);

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

        if (! is_array($from)) {
            $from = [$from];
        }

        $change = $this->transition($field);

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

        if (! is_array($to)) {
            $to = [$to];
        }

        $change = $this->transition($field);

        if ($change) {
            return in_array($change['new'], $to);
        }
    }

    /**
     * Get an array of allowed next transition values
     *
     * @param $field
     * @param null $from
     * @return array
     */
    public function allowedTransitionsOf($field, $from = null)
    {
        $from = $from ?: $this->$field; // from current value

        return $this->processor()->allowedTransitionsOf($field, $from);
    }

    /*
    |--------------------------------------------------------------------------
    | Field specific change tracking using 'changes' module
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Get all tracked changes of element.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function changes()
    {
        return $this->morphMany('App\Mainframe\Modules\Changes\Change', 'changeable');
    }

    /**
     * Store tracked changes in changes table
     *
     * @return $this
     */
    public function trackFieldChanges()
    {
        $fields = $this->processor()->getTrackedFields();

        // dd($this->getChanges());
        foreach ($fields as $field) {
            if ($this->fieldHasChanged($field)) {
                $transition = $this->transition($field);
                $this->changes()->create([
                    'module_id'    => $this->module()->id,
                    'element_id'   => $this->id,
                    'element_uuid' => $this->uuid,
                    'field'        => $field,
                    'old'          => $transition['old'],
                    'new'          => $transition['new'],
                ]);
            }
        }

        return $this;
    }

    /**
     * Get a change from a tracked field.
     *
     * @param $field
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function track($field)
    {
        return $this->changes()->where('field', $field);
    }

    /*
    |--------------------------------------------------------------------------
    | User related functions
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get the user who has created the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who has last updated the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Returns array of user ids including creator and updater user ids.
     * This can be overridden in different modules as per business.
     *
     * @return array
     */
    public function relatedUserIds()
    {
        $userIds = []; // Init array to store all user ids
        if (isset($this->creator->id)) {
            $userIds[] = $this->creator->id;
        }
        //get the creator
        //if the creator and updater is same no need to add the id twice
        if (isset($this->updater->id, $this->creator->id)
            && $this->creator->id !== $this->updater->id) {
            $userIds[] = $this->updater->id;
        } //get the updater

        return $userIds;
    }

    /*
    |--------------------------------------------------------------------------
    | Tenants & Project related functions
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Checks if a user has tenant context
     *
     * @return bool
     * @internal param $name
     */
    public function hasTenantContext() { return $this->hasColumn('tenant_id'); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tenant() { return $this->belongsTo(Tenant::class); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project() { return $this->belongsTo(Project::class); }

    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Check if the model is being created.
     *
     * @return bool
     */
    public function isCreating()
    {
        return ! $this->isUpdating();
    }

    /**
     * Check if the model is being updated.
     *
     * @return bool
     */
    public function isUpdating()
    {
        return isset($this->id);
    }

    /**
     * @return bool
     */
    public function isCreated()
    {
        return $this->isUpdating();
    }

    /**
     * Disable model events. Useful for avoiding infinite loop scenario.
     *
     * @return $this
     */
    public function disableEvents()
    {
        $model = $this->module()->model;
        $model::unsetEventDispatcher();

        return $this;
    }

    /**
     * Disable model events while saving.
     *
     * @param  array $options
     * @return mixed
     */
    public function saveQuietly(array $options = [])
    {
        return static::withoutEvents(function () use ($options) {
            return $this->save($options);
        });
    }
    /*
    |--------------------------------------------------------------------------
    | Processor related functions
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Get the processor for this element
     *
     * @return mixed|\App\Mainframe\Features\Modular\Validator\ModelProcessor
     */
    public function processor()
    {
        return $this->module()->processorInstance($this);
    }

    /**
     * Run processor logic on model for save().
     * This covers both create and update cases.
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|mixed
     */
    public function process() // Todo: Need to reevaluate this functions purpose.
    {
        return $this->processor()->forSave();
    }

    /**
     * Get a processed element after running the processor logic.
     * This element may not be fully valid.
     *
     * @return $this
     */
    public function processed() // Todo: Need to reevaluate this functions purpose.
    {
        return $this->process()->element;
    }

    /**
     * Get a valid element.
     *
     * @return \App\Mainframe\Features\Modular\BaseModule\BaseModule
     */
    public function validate() // Todo: Need to reevaluate this functions purpose.
    {
        return $this->module()->processorInstance($this)->forSave()->element;
    }

    /*
    |--------------------------------------------------------------------------
    | Uploadable and upload related
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Link existing uploads with this element
     *
     * @return $this
     */
    public function linkUploads()
    {
        /** @var Module $this */
        Upload::linkTemporaryUploads($this);

        return $this;
    }

    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function uploads()
    {
        // return $this->hasMany(Upload::class, 'element_id')
        //     ->where('module_id', $this->module()->id)
        //     ->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');
        return $this->morphMany('App\Mainframe\Modules\Uploads\Upload', 'uploadable');
    }

    /*
    |--------------------------------------------------------------------------
    | Commentable
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function comments()
    {
        return $this->morphMany('App\Mainframe\Modules\Comments\Comment', 'commentable');
    }

    /*
    |--------------------------------------------------------------------------
    | Autofill
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Auto fill some of the generic model fields.
     */
    public function autoFill()
    {

        $this->autoFillTenant();         // Inject tenant context.

        $this->uuid       = $this->uuid ?? uuid();
        $this->created_by = $this->created_by ?? user()->id;
        $this->created_at = $this->created_at ?? now();
        $this->updated_by = $this->updated_by ?? user()->id;
        $this->updated_at = now();
    }

    /**
     * Fill tenant id once during creation. Later tenant id can not be
     * updated.
     */
    public function autoFillTenant()
    {
        if (user()->ofTenant() && $this->hasTenantContext()) {
            $this->tenant_id  = $this->tenant_id ?: user()->tenant_id;
            $this->project_id = $this->project_id ?: $this->tenant->project_id;
        }
    }

    /**
     * Mark an entry as deleted by setting the deleted_at, deleted_by
     *
     * @param null $by
     * @param null $at
     * @return $this
     */
    public function markDeleted($by = null, $at = null)
    {

        $by = $by ?: user()->id;
        $at = $at ?: now();

        if (isset($this->id) && $this->deleted_by == null) {
            DB::table($this->getTable())->where('id', $this->id)
                ->update(['deleted_by' => $by,'deleted_at'=>$at]);
        }

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Framework functions to override based on business requirements
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Fill data and set calculated data in fields for saving the module
     * This can depend of supporting fillFunct, setFunct,calculateFunct
     */
    public function populate()
    {
        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Ability to create, edit, delete or restore
    |--------------------------------------------------------------------------
    |
    | An element can be editable or non-editable based on it's internal status
    | This is not related to any user, rather it is a model's individual sate
    | For example - A confirmed quotation should not be editable regardless
    | Of who is attempting to edit it.
    |
    */
    /**
     * Check if the model can be viewed based on it's values.
     *
     * @return bool
     */
    public function isViewable()
    {
        return true;
    }

    /**
     * Check if the model can be created based on it's values.
     *
     * @return bool
     */
    public function isCreatable()
    {
        return true;
    }

    /**
     * Check if the model can be edited based on it's values.
     *
     * @return bool
     */
    public function isEditable()
    {
        return true;
    }

    /**
     * Check if the model can be deleted based on it's values.
     *
     * @return bool
     */
    public function isDeletable()
    {
        return true;
    }

    /**
     * Check if the model can be created based on it's values.
     *
     * @return bool
     */
    public function isRestorable()
    {
        return true;
    }

}