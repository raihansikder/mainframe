<?php

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Change;
use App\Mainframe\Features\Core\ViewProcessor;
use App\Mainframe\Features\Modular\BaseModule\BaseModule;
use App\Mainframe\Helpers\Mf;
use App\Module;
use App\Project;
use App\Spread;
use App\Tenant;
use App\Upload;
use App\User;
use DB;
use Illuminate\Database\Eloquent\Builder;

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
    /**
     * @param $query
     * @return Builder
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
        return Module::byName($this->moduleName);
    }

    /**
     * Check if a model has a given attribute
     *
     * @param $attribute
     * @return bool
     */
    public function hasAttribute($attribute)
    {
        return array_key_exists($attribute, $this->getAttributes());
    }

    /**
     * Shorthand function for getAttributeKeysExcept.
     * Gets all attribute names
     *
     * @param  array  $except
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
     * @param  string  $key
     * @param  mixed  $value
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
     * @param  string  $field
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|mixed|null
     */
    public function updaterOfField($field)
    {
        $audits = $this->audits()->latest()->get();

        $userId = null;

        foreach ($audits as $audit) {
            $userId = $audit->user_id;
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
                'old' => $this->getOriginal($field),
                'new' => $this->$field,
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
        if (!is_array($from)) {
            $from = [$from];
        }

        if (!is_array($to)) {
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

        if (!is_array($from)) {
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

        if (!is_array($to)) {
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
     * @param  null  $from
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
     */
    public function changes()
    {
        return $this->hasMany(Change::class, 'element_id')->where('module_id', $this->module()->id);
        // return $this->morphMany('App\Mainframe\Modules\Changes\Change', 'changeable'); Note: Do not use morphMany
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
                    'module_id' => $this->module()->id,
                    'element_id' => $this->id,
                    'element_uuid' => $this->uuid,
                    'field' => $field,
                    'old' => $transition['old'],
                    'new' => $transition['new'],
                ]);
            }
        }

        return $this;
    }

    /**
     * Get a change from a tracked field.
     *
     * @param $field
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
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
    public function hasTenantContext() { return $this->hasColumn('tenant_id') && $this->tenantEnabled; }

    /**
     * @param  null  $user
     * @return bool
     */
    public function isTenantCompatible($user = null)
    {
        $user = $user ?: user();
        if ($this->hasTenantContext()
            && $user->ofTenant()
            && ($this->tenant_id != $user->tenant_id)) {
            return false;
        }

        return true;
    }

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
        return !$this->isUpdating();
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
        /** @var \Illuminate\Database\Eloquent\Model $model */
        $model = $this->module()->model;
        $model::unsetEventDispatcher();

        return $this;
    }

    /**
     * Disable model events while saving.
     *
     * @param  array  $options
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
     * Shorthand function for processor
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|mixed
     */
    public function process()
    {
        return $this->processor();
    }

    /**
     * Get a processed element after running the processor logic.
     * This element may not be fully valid.
     *
     * @return $this
     */
    public function processed() // Todo: Need to reevaluate this functions purpose.
    {
        return $this->process()->forSave()->element;
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
     * @return \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed
     */
    public function linkedModule()
    {
        /** @noinspection PhpUndefinedMethodInspection */
        return $this->belongsTo(Module::class, 'module_id')->remember(timer('long'));
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function uploads()
    {
        return $this->hasMany(Upload::class, 'element_id')->where('module_id', $this->module()->id);
        // return $this->morphMany('App\Upload', 'uploadable'); // Note: Do not use morphMany because our class name can change
    }

    /**
     * Relationship
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function spreads()
    {
        // return $this->hasMany(Spread::class, 'element_id')->where('module_id', $this->module()->id);
        return $this->morphMany(Spread::class, 'spreadable'); // Note: Keep it!!
    }

    /**
     * Store values in the database for key related to another model
     */
    public function syncSpreadKeys()
    {
        if (!isset($this->spreadAttributes)) {
            return;
        }

        foreach ($this->spreadAttributes as $field => $relatedTo) {

            $ids = toArray($this->$field);

            if (empty($ids)) {
                $this->spreads()->where('key', $field)->forceDelete();
                continue;
            }

            $this->spreads()->where('key', $field)->whereNotIn('related_id', $ids)->forceDelete();

            $existingIds = $this->spreads()->where('key', $field)->pluck('related_id');
            $newIds = collect($ids)->diff($existingIds)->all();

            $name = $this->getTable();

            foreach ($newIds as $relatedId) {

                $spread = [
                    'name' => $name,
                    'key' => $field,
                    'module_id' => $this->module()->id,
                    'element_id' => $this->id,
                    'element_uuid' => $this->uuid,
                    'relates_to' => $relatedTo,
                    'related_id' => $relatedId,
                ];

                $this->spreads()->create($spread);
            }

        }

        return $this;
    }

    /**
     * Store values in the database for key related to another model
     */
    public function syncSpreadTags()
    {
        if (!isset($this->tagAttributes)) {
            return;
        }

        foreach ($this->tagAttributes as $field) {

            $tags = cleanArray(toArray($this->$field));

            if (empty($tags)) {
                $this->spreads()->where('key', $field)->forceDelete();
                continue;
            }

            $this->spreads()->where('key', $field)->whereNotIn('tag', $tags)->forceDelete();

            $existingTags = $this->spreads()->where('key', $field)->pluck('tag');
            $newTags = collect($tags)->diff($existingTags)->all();

            $name = $this->getTable();

            foreach ($newTags as $tag) {

                $spread = [
                    'name' => $name,
                    'key' => $field,
                    'module_id' => $this->module()->id,
                    'element_id' => $this->id,
                    'element_uuid' => $this->uuid,
                    'tag' => $tag,
                ];

                $this->spreads()->create($spread);
            }

        }

        return $this;
    }

    public function spreadModels($slug)
    {

        $key = str_singular($slug).'_ids';
        $class = $this->spreadAttributes[$key];

        return $this->belongsToMany($class, 'spreads', 'spreadable_id', 'related_id')->where('key', $key);

    }

    public function spreadTags($field)
    {
        return $this->hasMany(Spread::class, 'element_id')->where('module_id', $this->module()->id)->where('key', $field);
        // return $this->morphMany(Spread::class, 'spreadable')->where('key', $field);
    }

    public function getSpreadTags($field)
    {
        return $this->spreadTags($field)->pluck('tag')->toArray();
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
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class, 'element_id')->where('module_id', $this->module()->id);
    // }

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

        $this->uuid = $this->uuid ?? uuid();
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
        if (user()->ofTenant() && $this->isTenantCompatible()) {
            $this->tenant_id = $this->tenant_id ?: user()->tenant_id;
            $this->project_id = $this->project_id ?: $this->tenant->project_id;
        }
    }

    /**
     * Mark an entry as deleted by setting the deleted_at, deleted_by
     *
     * @param  null  $by
     * @param  null  $at
     * @return $this
     */
    public function markDeleted($by = null, $at = null)
    {

        $by = $by ?: user()->id;
        $at = $at ?: now();

        if (isset($this->id) && $this->deleted_by == null) {
            DB::table($this->getTable())->where('id', $this->id)
                ->update(['deleted_by' => $by, 'deleted_at' => $at]);
        }

        return $this;
    }

    /**
     * Fill data to relate this upload with another module element.
     *
     * @param  string  $fieldPrefix  i.e.uploadable
     * @return $this
     */
    public function fillModuleAndElement($fieldPrefix)
    {
        $module = $this->linkedModule ?? null;
        $element = null;

        $idField = $fieldPrefix.'_id';
        $typeField = $fieldPrefix.'_type';

        /** @var \App\Mainframe\Features\Modular\BaseModule\BaseModule $model */
        if ($module) {
            $model = $module->model;
            $this->$typeField = trim($module->model, '\\');
        }

        if ($module && isset($this->element_id)) {
            $element = $model::remember(timer('very-long'))
                ->find($this->element_id);
        }

        if ($element) {
            $this->$idField = $element->id;
            /** @noinspection PhpUndefinedFieldInspection */
            $this->element_uuid = $element->uuid;
        }

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | URLs and links
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get an instance of the view processor
     *
     * @return mixed|null
     */
    public function viewProcessor()
    {
        $module = $this->module();
        $modelClassPath = $module->modelClassPath();

        $classPaths = [

            // Step 1: Check in same folder
            $modelClassPath.'View',
            $modelClassPath.'ViewProcessor',

            // Step 2: Check in module directory
            $module->namespace.'\\'.$module->modelClassName().'View',
            $module->namespace.'\\'.$module->modelClassName().'ViewProcessor',

            // Step 3: Check project default
            '\App\Projects\\'.config('mainframe.config.project').'\Features\Modular\BaseModule\BaseModuleView',
            '\App\Projects\\'.config('mainframe.config.project').'\Features\Modular\BaseModule\BaseModuleViewProcessor',

            // Step 4: Fallback to mainframe
            'App\Mainframe\Features\Modular\BaseModule\BaseModuleView',
            'App\Mainframe\Features\Modular\BaseModule\BaseModuleViewProcessor',
        ];

        foreach ($classPaths as $classPath) {
            if (class_exists($classPath)) {
                /** @var ViewProcessor $view */
                $view = new $classPath;

                /** @var BaseModule $this */
                return $view->setModel($this)->setModule($module);
            }
        }

        return null;

    }

    /**
     * Edit link
     *
     * @return string
     */
    public function editUrl()
    {
        if ($this->isCreated()) {
            return route($this->module()->route_name.'.edit', $this->id);
        }

        return null;
    }

    /**
     * HTML link
     *
     * @param  string  $field
     * @return string
     */
    public function editLink($field = 'id')
    {
        return "<a href='".$this->editUrl()."'>{$this->$field}</a>";
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
    // public function populate()
    // {
    //     return $this;
    // }

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