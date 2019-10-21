<?php

namespace App;

use Str;
use App\Mainframe\BaseModule;
use App\Observers\ChangeObserver;

/**
 * Class Change
 *
 * @package App
 * @property int $id
 * @property string|null $uuid
 * @property int|null $tenant_id
 * @property string|null $name
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $deleted_by
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Change onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Change withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Change withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $change_set
 * @property int|null $module_id
 * @property string|null $moduleName
 * @property int|null $element_id
 * @property string|null $element_uuid
 * @property string|null $field
 * @property string|null $old
 * @property string|null $new
 * @property string|null $description
 * @property-read \App\User|null $creator
 * @property-read \App\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereChangeset($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereElementId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereElementUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereField($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereModuleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereNew($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereOld($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read \App\Upload $latestUpload
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 * @property string|null $module_name TRIAL
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Change whereChangeSet($value)
 */
class Change extends BaseModule
{
    // use IsoModule;
    /**
     * Mass assignment fields (White-listed fields)
     *
     * @var array
     */
    protected $fillable = [
        'uuid',
        'tenant_id',
        'name',
        'change_set',
        'module_id',
        'moduleName',
        'element_id',
        'element_uuid',
        'field',
        'old',
        'new',
        'description',
        'is_active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'deleted_by',
    ];

    /**
     * Disallow from mass assignment. (Black-listed fields)
     *
     * @var array
     */
    // protected $guarded = [];

    /**
     * Date fields
     *
     * @var array
     */
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    /**
     * Custom validation messages.
     *
     * @var array
     */
    public static $customValidationMessages = [
        //'name.required' => 'Custom message.',
    ];

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     * Example: 'name' => ['required', 'Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/']
     *
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            // 'name' => 'required|between:1,255|unique:changes,name,' . (isset($element->id) ? "$element->id" : 'null') . ',id,deleted_at,NULL',
            // 'is_active' => 'required|in:1,0',
            // 'tenant_id'  => 'required|tenants,id,is_active,1',
            // 'created_by' => 'exists:users,id,is_active,1', // Optimistic validation for created_by,updated_by
            // 'updated_by' => 'exists:users,id,is_active,1',

        ];

        return array_merge($rules, $merge);
    }

    /**
     * Automatic eager load relation by default (can be expensive)
     *
     * @var array
     */
    // protected $with = ['relation1', 'relation2'];

    ############################################################################################
    # Model events
    ############################################################################################

    public static function boot()
    {
        parent::boot();
        Change::observe(ChangeObserver::class);

        /************************************************************/
        // Following code block executes - when an element is in process
        // of creation for the first time but the creation has not
        // completed yet.
        /************************************************************/
        // static::creating(function (Change $element) { });

        /************************************************************/
        // Following code block executes - after an element is created
        // for the first time.
        /************************************************************/
        // static::created(function (Change $element) { });

        /************************************************************/
        // Following code block executes - when an already existing
        // element is in process of being updated but the update is
        // not yet complete.
        /************************************************************/
        // static::updating(function (Change $element) {});

        /************************************************************/
        // Following code block executes - after an element
        // is successfully updated
        /************************************************************/
        //static::updated(function (Change $element) {});

        /************************************************************/
        // Execute codes during saving (both creating and updating)
        /************************************************************/
        static::saving(function (Change $element) {
            $valid = true;
            /************************************************************/
            // Your validation goes here
            // if($valid) $valid = $element->isSomethingDoable(true)
            /************************************************************/
            // fill common fields, null-fill, trim blanks from input
            $element->is_active = 1;

            return $valid;
        });

        /************************************************************/
        // Execute codes after model is successfully saved
        /************************************************************/
        // static::saved(function (Change $element) {});

        /************************************************************/
        // Following code block executes - when some element is in
        // the process of being deleted. This is good place to
        // put validations for eligibility of deletion.
        /************************************************************/
        // static::deleting(function (Change $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully deleted.
        /************************************************************/
        // static::deleted(function (Change $element) {});

        /************************************************************/
        // Following code block executes - when an already deleted element
        // is in the process of being restored.
        /************************************************************/
        // static::restoring(function (Change $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully restored.
        /************************************************************/
        //static::restored(function (Change $element) {});
    }

    ############################################################################################
    # MainframeModelValidator functions
    ############################################################################################

    /**
     * @param  bool|false  $setMsgSession  setting it false will not store the message in session
     * @return bool
     */
    //    public function isSomethingDoable($setMsgSession = false)
    //    {
    //        $valid = true;
    //        // Make invalid(Not request-able) if {something doesn't match with something}
    //        if ($valid && $this->id == null) {
    //            if ($setMsgSession) $valid = setError("Something is wrong. Id is Null!!"); // make valid flag false and set validation error message in session if message flag is true
    //            else $valid = false; // don't set any message only set validation as false.
    //        }
    //
    //        return $valid;
    //    }

    ############################################################################################
    # Helper functions
    ############################################################################################
    /**
     * Non static functions can be directly called $element->function();
     * Such functions are useful when an object(element) is already instantiated
     * and some processing is required for that
     */
    // public function someAction() { }

    /**
     * Static functions needs to be called using Model::function($id)
     * Inside static function you may need to query and get the element
     *
     * @param $id
     */
    // public static function someOtherAction($id) { }

    /**
     * Get changes of a model and store in session.
     *
     * @param  \App\Mainframe\Basemodule  $element
     */
    public static function keepChangesInSession($element)
    {
        \Session::put('model-changes', Change::getDifferences($element));
    }

    /**
     * Get the changes in an array
     *
     * @param  \App\Mainframe\Basemodule  $filled_element
     * @param  array  $except
     * @return array
     */
    public static function getDifferences($filled_element, $except = ['updated_at'])
    {
        /** @var BaseModule $Model */

        $changes = [];
        if (isset($filled_element->id)) {

            $new_values = $filled_element->getDirty();
            $Model = get_class($filled_element);
            $original = $Model::find($filled_element->id);

            $i = 0;
            foreach ($new_values as $attribute => $value) {
                if (! in_array($attribute, $except) && $original->$attribute != $value) {

                    $old_value = $original->$attribute;
                    if (is_array($old_value)) {
                        $old_value = json_encode($old_value);
                    }

                    $new_value = $value;
                    if (is_array($new_value)) {
                        $new_value = json_encode($new_value);
                    }

                    $changes[$i] = [
                        "field" => $attribute,
                        "old" => $old_value,
                        "new" => $new_value,
                    ];
                    $i++;
                }
            }

            return $changes;
        }
    }

    /**
     * Fetch changes that are stored in session and save in database.
     *
     * @param  string  $change_name
     * @param  \App\Mainframe\Basemodule  $element
     * @param  string  $desc
     */
    public static function storeChangesFromSession($change_name = "", $element, $desc = "")
    {
        if (\Session::has('model-changes')) {
            Change::storeChanges($change_name, $element, \Session::get('model-changes'), $desc);
        }
    }

    /**
     * @param  string  $change_name  : assign a meaningful name of the change
     * @param  \App\Mainframe\Basemodule  $element
     * @param  array  $changes
     * @param  string  $desc
     * @internal param array $change_items
     */
    public static function storeChanges($change_name = '', $element, $changes = [], $desc = "")
    {
        if (isset($element->id) && count($changes)) {
            $change_set = Str::random(8);
            if ($module = Module::whereName(moduleName(get_class($element)))->first()) {
                foreach ($changes as $change) {
                    if (is_array($change['new'])) {
                        $change['new'] = implode(',', $change['new']);
                    }
                    if (is_array($change['old'])) {
                        $change['old'] = implode(',', $change['old']);
                    }

                    $change = Change::create([
                        "name" => $change_name,
                        "change_set" => $change_set,
                        "module_id" => $module->id,
                        "module_name" => $module->name,
                        "element_id" => $element->id,
                        "element_uuid" => $element->uuid,
                        "field" => $change['field'],
                        "old" => $change['old'],
                        "new" => $change['new'],
                        "desc" => $desc,
                        "created_by" => $element->updated_by,
                        "updated_by" => $element->updated_by,
                    ]);
                }
            }
        }
    }

    /**
     * Store a log entry when a new element is created
     *
     * @param  \App\Mainframe\Basemodule  $element
     * @param  string  $details
     */
    public static function storeCreateLog($element, $details = "")
    {
        if (isset($element->id)) {
            $change_set = str_random(8);
            if ($module = Module::whereName(moduleName(get_class($element)))->remember(cacheTime('long'))->first()) {
                $change = Change::create([
                    "name" => "Create new ".get_class($element),
                    "change_set" => $change_set,
                    "module_id" => $module->id,
                    "moduleName" => $module->name,
                    "element_id" => $element->id,
                    "element_uuid" => $element->uuid,
                    //"event" => "Create",
                    // "details" => $details,
                    "created_by" => $element->updated_by,
                    "updated_by" => $element->updated_by,
                ]);
            }
        }
    }
    ############################################################################################
    # Permission functions
    # ---------------------------------------------------------------------------------------- #
    /*
     * This is a place holder to write the functions that resolve permission to a specific model.
     * In the parent class there are the follow functions that checks whether a user has
     * permission to perform the following on an element. Rewrite these functions
     * in case more customized access management is required.
     */
    ############################################################################################

    /**
     * Checks if the $module is viewable by current or any user passed as parameter.
     * spyrElementViewable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @return bool
     */
    //    public function isViewable($user_id = null)
    //    {
    //        $valid = false;
    //        if ($valid = spyrElementViewable($this, $user_id)) {
    //            //if ($valid && somethingElse()) $valid = false;
    //        }
    //        return $valid;
    //    }

    /**
     * Checks if the $module is editable by current or any user passed as parameter.
     * spyrElementEditable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @return bool
     */
    //    public function isEditable($user_id = null)
    //    {
    //        $valid = false;
    //        if ($valid = spyrElementEditable($this, $user_id)) {
    //            //if ($valid && somethingElse()) $valid = false;
    //        }
    //        return $valid;
    //    }

    /**
     * Checks if the $module is deletable by current or any user passed as parameter.
     * spyrElementDeletable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @return bool
     */
    //    public function isDeletable($user_id = null)
    //    {
    //        $valid = false;
    //        if ($valid = spyrElementDeletable($this, $user_id)) {
    //            //if ($valid && somethingElse()) $valid = false;
    //        }
    //        return $valid;
    //    }

    /**
     * Checks if the $module is restorable by current or any user passed as parameter.
     * spyrElementRestorable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @return bool
     */
    //    public function isRestorable($user_id = null)
    //    {
    //        $valid = false;
    //        if ($valid = spyrElementRestorable($this, $user_id)) {
    //            //if ($valid && somethingElse()) $valid = false;
    //        }
    //        return $valid;
    //    }

    ############################################################################################
    # Query scopes
    # ---------------------------------------------------------------------------------------- #
    /*
     * Scopes allow you to easily re-use query logic in your models. To define a scope, simply
     * prefix a model method with scope:
     */
    /*
       public function scopePopular($query) { return $query->where('votes', '>', 100); }
       public function scopeWomen($query) { return $query->whereGender('W'); }
       # Example of user
       $users = User::popular()->women()->orderBy('created_at')->get();
    */
    ############################################################################################

    // Write new query scopes here.

    ############################################################################################
    # Dynamic scopes
    # ---------------------------------------------------------------------------------------- #
    /*
     * Scopes allow you to easily re-use query logic in your models. To define a scope, simply
     * prefix a model method with scope:
     */
    /*
    public function scopeOfType($query, $type) { return $query->whereType($type); }
    # Example of user
    $users = User::ofType('member')->get();
    */
    ############################################################################################

    // Write new dynamic query scopes here.

    ############################################################################################
    # Model relationships
    # ---------------------------------------------------------------------------------------- #
    /*
     * This is a place holder to write model relationships. In the parent class there are
     * In the parent class there are the follow two relations creator(), updater() are
     * already defined.
     */
    ############################################################################################

    # Default relationships already available in base Class 'BaseModule'
    //public function updater() { return $this->belongsTo('User', 'updated_by'); }
    //public function creator() { return $this->belongsTo('User', 'created_by'); }

    // Write new relationships below this line

    ############################################################################################
    # Accessors & Mutators
    # ---------------------------------------------------------------------------------------- #
    /*
     * Eloquent provides a convenient way to transform your model attributes when getting or setting them. Simply
     * define a getFooAttribute method on your model to declare an accessor. Keep in mind that the methods
     * should follow camel-casing, even though your database columns are snake-case:
     */
    // Example
    // public function getFirstNameAttribute($value) { return ucfirst($value); }
    // public function setFirstNameAttribute($value) { $this->attributes['first_name'] = strtolower($value); }
    ############################################################################################

    // Write accessors and mutators here.

}
