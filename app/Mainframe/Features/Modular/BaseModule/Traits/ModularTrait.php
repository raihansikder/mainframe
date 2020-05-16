<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Features\Modular\BaseModule\Traits;

use App\Mainframe\Helpers\Mf;
use App\Mainframe\Modules\Comments\Comment;
use App\Mainframe\Modules\Modules\Module;
use App\Mainframe\Modules\Projects\Project;
use App\Mainframe\Modules\Tenants\Tenant;
use App\Mainframe\Modules\Uploads\Upload;
use App\User;

/** @mixin \App\Mainframe\Features\Modular\BaseModule\BaseModule $this */
trait ModularTrait
{
    /*
    |--------------------------------------------------------------------------
    | Module features
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    /**
     * Get the module object that an element belongs to. If the element is $tenant then the function
     * returns the row from modules table that has module name 'tenants'.
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
     * Get all attribute names
     *
     * @return bool
     */
    public function getAttributeKeys()
    {
        return array_keys($this->getAttributes());
    }

    /**
     * Get attribute except
     *
     * @param array $except
     * @return bool
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

    /*
    |--------------------------------------------------------------------------
    | Query scopes + Dynamic scopes
    |--------------------------------------------------------------------------
    |
    | Scopes allow you to easily re-use query logic in your models. To define
    | a scope, simply prefix a model method with scope:
    */
    public function scopeActive($query) { return $query->where('is_active', 1); }


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
    | Value transitions
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
     * Get old and new value of a changed field field
     *
     * @param $field
     * @return array
     */
    public function transition($field)
    {
        if ($this->fieldHasChanged($field)) {
            return ['field' => $field, 'old' => $this->getOriginal($field), 'new' => $this->$field];
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
        $from = $from ?: $this->$field;

        return $this->processor()->allowedTransitionsOf($field, $from);
    }

    /*
    |--------------------------------------------------------------------------
    | Related users
    |--------------------------------------------------------------------------
    |
    */

    /**
     * Get the user who has created the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator() { return $this->belongsTo(User::class, 'created_by'); }

    /**
     * Get the user who has last updated the element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function updater() { return $this->belongsTo(User::class, 'updated_by'); }

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
        if (isset($this->updater->id, $this->creator->id) && $this->creator->id !== $this->updater->id) {
            $userIds[] = $this->updater->id;
        } //get the updater

        return $userIds;
    }

    /*
    |--------------------------------------------------------------------------
    | Tenants & Project
    |--------------------------------------------------------------------------
    |
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
     * Check if the model is being created.
     *
     * @return bool
     */
    public function isUpdating()
    {
        return isset($this->id);
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

    /**
     * Disable events to avoid infinite loop
     *
     * @return $this
     */
    public function disableEvents()
    {
        /** @var \App\Mainframe\Modules\SuperHeroes\SuperHero $model */
        $model = $this->module()->model;

        $model::unsetEventDispatcher();

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Processor
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Get the processor for this module
     *
     * @return mixed|\App\Mainframe\Features\Modular\Validator\ModelProcessor
     */
    public function processor()
    {
        return $this->module()->processorInstance($this);
    }

    /**
     * Run processor logic on model
     *
     * @return \App\Mainframe\Features\Modular\Validator\ModelProcessor|mixed
     */
    public function process()
    {
        return $this->processor()->forSave();
    }

    /**
     * @return $this
     */
    public function processed()
    {
        return $this->process()->element;
    }

    public function validate()
    {
        return $this->module()->processorInstance($this)->forSave()->element;
    }

    /*
    |--------------------------------------------------------------------------
    | Uploadable
    |--------------------------------------------------------------------------
    |
    */
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

    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    // public function latestUpload()
    // {
    //     return $this->hasOne(Upload::class, 'element_id')
    //         ->where('module_id', $this->module()->id)
    //         ->orderBy('created_at', 'DESC');
    // }

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
        // return $this->hasMany('App\Mainframe\Modules\Comments\Comment', 'element_id')
        //     ->where('module_id', $this->module()->id)
        //     ->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');

        return $this->morphMany('App\Mainframe\Modules\Comments\Comment', 'commentable');
    }

    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    // public function latestComment()
    // {
    //     return $this->hasOne(Comment::class, 'element_id')
    //         ->where('module_id', $this->module()->id)
    //         ->orderBy('created_at', 'DESC');
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
        // Inject tenant context.
        $this->autoFillTenant();

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
        if (user()->ofTenant() && $this->hasTenantContext()) {
            $this->tenant_id = $this->tenant_id ?: user()->tenant_id;
            $this->project_id = $this->project_id ?: $this->tenant->project_id;
        }
    }

    /**
     * Fill data and set calculated data in fields for saving the module
     * This can depend of supporting fillFunct, setFunct,calculateFunct
     */
    public function populate()
    {
        // $this->fillAddress()->setAmounts();

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