<?php

namespace App;

use App\Traits\IsoModule;
use Illuminate\Database\Eloquent\Model;
use Validator;

/**
 * Class Basemodule
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
 * @method static \Illuminate\Database\Query\Builder|\App\Basemodule onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Basemodule withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Basemodule withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\User $creator
 * @property-read \App\User $updater
 * @property string path
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Basemodule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Basemodule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Basemodule query()
 */
class Basemodule extends Model
{
    // use SoftDeletes;
    // use Rememberable;
    use IsoModule;

    /** @var array statuses */
    public static $statuses = [
        /*'Requested',
        'Move in complete',
        'Declined',
        'Approved'*/
    ];

    /**
     * List of appended attribute. This attributes will be loaded in each Model
     * @var array
     */
    // protected $appends = ['some_new_field'];
    /** @var array $status_transitions A map of allowed status changes from original status */
    public static $status_transitions = [
        /*'Requested' => ['Requested', 'Approved', 'Move in complete'],
        'Move in complete' => ['Move in complete'],
        'Declined' => ['Declined', 'Approved'],
        'Approved' => ['Approved', 'Declined', 'Move in complete']*/
    ];
    /**
     * Custom validation messages.
     * @var array
     */
    public static $custom_validation_messages = [
        //'name.required' => 'Custom message.',
    ];
    /**
     * Mass assignment fields (White-listed fields)
     * @var array
     */
    protected $fillable = ['uuid', 'name', 'tenant_id', 'is_active', 'created_by', 'updated_by', 'deleted_by'];
    /**
     * Disallow from mass assignment. (Black-listed fields)
     * @var array
     */
    protected $guarded = [];
    /** @var array Fields that should not be allowed to update */
    protected $restrict_updates = [];
    /**
     * The attributes that should be mutated to dates.
     * @var array
     */
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     * Example: 'name' => ['required', 'Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/']
     * @param       $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => 'required|between:1,255|unique:superheros,name'.(isset($element->id) ? ",$element->id" : ''),
            // 'created_by' => 'integer|exists:users,id,is_active,1',
            // 'updated_by' => 'integer|exists:users,id,is_active,1',
            // 'is_active'  => 'required|in:0,1',
            // 'tenant_id'  => 'required|tenants,id,is_active,1',
            // 'status'     => 'in:' . implode(',', self::$statuses),
        ];

        return array_merge($rules, $merge);
    }

    /**
     * Automatic eager load relation by default (can be expensive)
     * @var array
     */
    // protected $with = ['relation1', 'relation2'];

    ############################################################################################
    # Model events
    ############################################################################################
    // Model events are handled in individual models that is extended from this base module.
    // So no model event instantiated in this class.

    public static function boot()
    {
        parent::boot(); // This line is required as uncommented to boot SoftDeletingTrait
    }

    ############################################################################################
    # Validator functions
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

    /**
     * This function validates a model based on the validation rule.
     * Also checks if it isCreatable/isEditable
     * @return \Illuminate\Validation\Validator
     */
    public function validateModel()
    {
        $validator = Validator::make(
            $this->attributes,
            static::rules($this),
            static::$custom_validation_messages
        );

        return $validator;
        /*if (!$validator->passes()) {
            $valid = setError("Validation failed " . $this->module()->title);
            foreach ($validator->messages()->all() as $e) {
                Session::push('error', $e);
            }
        }*/
        /*
        if (!isset($this->id)) {
            if (!$this->isCreatable()) {
                $valid = setError("Can not save new " . $this->module()->title . " Error: Basemodule validate()");
            }

        } else {
            if (!$this->isEditable()) {
                $valid = setError("Can not update " . mlink($this->module()->name, $this->id) . " Error: Basemodule isEditable()");
            }
        }
        */
        //return $valid;
    }

    /**
     * Get fields that are restricted for update.
     * @return array
     */
    // public function restrictedUpdates() {
    //     return $this->restrict_updates;
    // }

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
     * @internal param $id
     */
    // public static function someOtherAction($id) { }

    /**
     * Returns array of user ids including creator and updater user ids.
     * This can be overridden in different modules as per business.
     * @return array
     */
    // public function relatedUsers() {
    //     $user_ids = []; // Init array to store all user ids
    //     if (isset($this->creator->id))
    //         $user_ids[] = $this->creator->id; //get the creator
    //     if (isset($this->updater->id) && isset($this->creator->id) && $this->creator->id !== $this->updater->id) //if the creator and updater is same no need to add the id twice
    //         $user_ids[] = $this->updater->id; //get the updater
    //     return $user_ids;
    // }

    /**
     * Get the module object that an element belongs to. If the element is $tenant then the function
     * returns the row from modules table that has module name 'tenants'.
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    // public function module() {
    //     return Module::where('name', moduleName(get_class($this)))->remember(cacheTime('module-list'))->first();
    // }

    /**
     * Get uploads of specific types
     * @param  array  $uploadtype_ids
     * @return mixed
     */
    // public function getUploads($uploadtype_ids = []) {
    //     return $this->uploads()->whereIn('uploadtype_id', $uploadtype_ids)->orderBy('created_at', 'DESC');
    // }

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
     * Checks if the $element is creatable by current or any user passed as parameter.
     * spyrElementViewable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    // public function isCreatable($user_id = null, $set_msg = false)
    // {
    //     $valid = true;
    //     // if ($valid = spyrElementCreatable($this, $user_id, $set_msg)) {
    //     //     // Write new validation logic for this operation in this block.
    //     // }
    //     return $valid;
    // }

    /**
     * Checks if the $element is viewable by current or any user passed as parameter.
     * spyrElementViewable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    // public function isViewable($user_id = null, $set_msg = false)
    // {
    //     $valid = true;
    //     // if ($valid = spyrElementViewable($this, $user_id, $set_msg)) {
    //     //     /*
    //     //     if ($this->isCreatable($user_id, $set_msg)) {
    //     //         // Write new validation logic for this operation in this block.
    //     //     }
    //     //     */
    //     //     $valid = $this->isCreatable($user_id, $set_msg);
    //     // }
    //     return $valid;
    // }

    /**
     * Checks if the $element is editable by current or any user passed as parameter.
     * spyrElementEditable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    // public function isEditable($user_id = null, $set_msg = false)
    // {
    //     $valid = true;
    //     // if ($valid = spyrElementEditable($this, $user_id, $set_msg)) {
    //     //     /*
    //     //     if ($this->isCreatable($user_id, $set_msg)) {
    //     //         // Write new validation logic for this operation in this block.
    //     //     }
    //     //     */
    //     //     $valid = $this->isCreatable($user_id, $set_msg);
    //     // }
    //     return $valid;
    // }

    /**
     * Checks if the $element is deletable by current or any user passed as parameter.
     * spyrElementDeletable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    // public function isDeletable($user_id = null, $set_msg = false)
    // {
    //     $valid = true;
    //     // if ($valid = spyrElementDeletable($this, $user_id, $set_msg)) {
    //     //     /*
    //     //     if ($this->isEditable($user_id, $set_msg)) {
    //     //         // Write new validation logic for this operation in this block.
    //     //     }
    //     //     */
    //     //     $valid = $this->isEditable($user_id, $set_msg);
    //     // }
    //     return $valid;
    // }

    /**
     * Checks if the $element is restorable by current or any user passed as parameter.
     * spyrElementRestorable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    // public function isRestorable($user_id = null, $set_msg = false)
    // {
    //     $valid = true;
    //     // if ($valid = spyrElementRestorable($this, $user_id, $set_msg)) {
    //     //     /*
    //     //     if ($this->isEditable($user_id, $set_msg)) {
    //     //         // Write new validation logic for this operation in this block.
    //     //     }
    //     //     */
    //     //     $valid = $this->isEditable($user_id, $set_msg);
    //     // }
    //     return $valid;
    // }

    /**
     * Function checks whether an element can be assigned to an user.
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    // public function isAssignable($user_id = null, $set_msg = false) {
    //     return $this->isEditable($user_id, $set_msg);
    // }

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
    # Additional/Appended attributes
    # ---------------------------------------------------------------------------------------- #
    ############################################################################################

    /**
     * Function to return an appended attribute in a Model. The attribute name
     * should be added in $append array.
     * @return bool
     */
    /*public function getSomeNewFieldAttribute() {
        return true;
    }*/

    ############################################################################################
    # Model relationships
    # ---------------------------------------------------------------------------------------- #
    /*
     * This is a place holder to write model relationships. In the parent class there are
     * In the parent class there are the follow two relations creator(), updater() are
     * already defined.
     */
    ############################################################################################
    /**
     * Get the user who has created the element
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function creator()
    // {
    //     return $this->belongsTo('User', 'created_by');
    // }

    /**
     * Get the user who has last updated the element
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function updater()
    // {
    //     return $this->belongsTo('User', 'updated_by');
    // }

    /**
     * Get a list of uploads under an element.
     * @return mixed
     */
    // public function uploads() {
    //     return $this->hasMany('Upload', 'element_id')->where('module_id', $this->module()->id)->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');
    // }

    /**
     * Get a list of changes that happened to an element
     * @return mixed
     */
    // public function changes() {
    //     return $this->hasMany('Change', 'element_id')->where('module_id', $this->module()->id)->orderBy('created_at', 'DESC');;
    // }

    /**
     * Some modules like uploads, messages etc have a parent element under which that upload was made.
     * We call this linked element
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function linkedElement() {
    //     return $this->belongsTo(modelNameFromModuleId($this->module_id), 'module_entry_id');
    // }

    /**
     * List of statusupdates
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function statusupdates() {
    //     return $this->hasMany('Statusupdate', 'element_id')->where('module_id', $this->module()->id)->orderBy('created_at', 'DESC');
    // }

    /**
     * Get the last updated status
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function lastStatusupdate() {
    //     return $this->hasOne('Statusupdate', 'element_id')->where('module_id', $this->module()->id)->orderBy('created_at', 'DESC');
    // }
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
