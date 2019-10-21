<?php
/** @noinspection OneTimeUseVariablesInspection */
/** @noinspection PhpStatementHasEmptyBodyInspection */
/** @noinspection MissingOrEmptyGroupStatementInspection */
/** @noinspection PhpUnusedLocalVariableInspection */
/** @noinspection PhpUndefinedMethodInspection */
/** @noinspection PhpUnusedParameterInspection */

namespace App\Mainframe\Traits;

use App\User;
use Validator;
use App\Upload;
use App\Change;
use App\Module;

trait IsoModule
{

    /**
     * Fields for full text search i.e. LIKE '%substr%'
     *
     * @var array
     */
    public static $text_fields = ['name', 'name_ext'];

    /**
     * @param $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            // 'name' => 'required|between:1,255|unique:superheros,name' . (isset($element->id) ? ",$element->id" : ''),
            // 'created_by' => 'integer|exists:users,id,is_active,1',
            // 'updated_by' => 'integer|exists:users,id,is_active,1',
            // 'is_active'  => 'required|in:0,1',
            // 'tenant_id'  => 'required|tenants,id,is_active,1',
            // 'status'     => 'in:' . implode(',', self::$statuses),
        ];

        return array_merge($rules, $merge);
    }



    ############################################################################################
    # Model events
    ############################################################################################
    // Model events are handled in individual models that is extended from this base module.
    // So no model event instantiated in this class.

    // public static function boot()
    // {
    //     parent::boot(); // This line is required as uncommented to boot SoftDeletingTrait
    // }

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

    /**
     * This function validates a model based on the validation rule.
     * Also checks if it isCreatable/isEditable
     *
     * @return \Illuminate\Validation\Validator
     */
    public function validateModel()
    {
        return Validator::make($this->attributes,
            static::rules($this),
            static::$customValidationMessages);
    }

    /**
     * Get fields that are restricted for update.
     *
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
     *
     * @internal param $id
     */
    // public static function someOtherAction($id) { }

    /**
     * Returns array of user ids including creator and updater user ids.
     * This can be overridden in different modules as per business.
     *
     * @return array
     */
    public function relatedUsers()
    {
        $user_ids = []; // Init array to store all user ids
        if (isset($this->creator->id)) {
            $user_ids[] = $this->creator->id;
        }
        //get the creator
        //if the creator and updater is same no need to add the id twice
        if (isset($this->updater->id, $this->creator->id) && $this->creator->id !== $this->updater->id) {
            $user_ids[] = $this->updater->id;
        } //get the updater

        return $user_ids;
    }

    /**
     * Get the module object that an element belongs to. If the element is $tenant then the function
     * returns the row from modules table that has module name 'tenants'.
     *
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function module()
    {
        return Module::where('name', moduleName(get_class($this)))->remember(cacheTime('very-long'))->first();
    }


    /**
     * Get uploads of specific types
     *
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
     *
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    public function isCreatable($user_id = null, $set_msg = false)
    {
        /** @var \App\User $user */
        $user = user($user_id);
        $valid = true;
        if ($valid = spyrElementCreatable($this, $user_id, $set_msg)) {
            // Write new validation logic for this operation in this block.
        }

        return $valid;
    }

    /**
     * Checks if the $element is viewable by current or any user passed as parameter.
     * spyrElementViewable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    public function isViewable($user_id = null, $set_msg = false)
    {
        /** @var \App\User $user */
        $user = user($user_id);
        $valid = true;
        if ($valid = spyrElementViewable($this, $user_id, $set_msg)) {
            /*
            if ($this->isCreatable($user_id, $set_msg)) {
                // Write new validation logic for this operation in this block.
            }
            */
            //$valid = $this->isCreatable($user_id, $set_msg);
        }

        return $valid;
    }

    /**
     * Checks if the $element is editable by current or any user passed as parameter.
     * spyrElementEditable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    public function isEditable($user_id = null, $set_msg = false)
    {

        /** @var \App\User $user */
        $user = user($user_id);
        $valid = true;
        if ($valid = spyrElementEditable($this, $user_id, $set_msg)) {

            // if ($this->isCreatable($user_id, $set_msg)) {
            //     // Write new validation logic for this operation in this block.
            // }

            // $valid = $this->isViewable($user_id, $set_msg);
        }

        return $valid;
    }

    /**
     * Checks if the $element is deletable by current or any user passed as parameter.
     * spyrElementDeletable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    public function isDeletable($user_id = null, $set_msg = false)
    {
        /** @var \App\User $user */
        $user = user($user_id);
        $valid = true;
        if ($valid = spyrElementDeletable($this, $user_id, $set_msg)) {

            // if ($this->isEditable($user_id, $set_msg)) {
            //     // Write new validation logic for this operation in this block.
            // }

            $valid = $this->isEditable($user_id, $set_msg);
        }

        return $valid;
    }

    /**
     * Checks if the $element is restorable by current or any user passed as parameter.
     * spyrElementRestorable() is the primary default checker based on permission
     * whether this should be allowed or not. The logic can be further
     * extend to implement more conditions.
     *
     * @param  null  $user_id
     * @param  bool  $set_msg
     * @return bool
     */
    public function isRestorable($user_id = null, $set_msg = false)
    {
        /** @var \App\User $user */
        $user = user($user_id);
        $valid = true;
        // if ($valid = spyrElementRestorable($this, $user_id, $set_msg)) {
        //     /*
        //     if ($this->isEditable($user_id, $set_msg)) {
        //         // Write new validation logic for this operation in this block.
        //     }
        //     */
        //     $valid = $this->isEditable($user_id, $set_msg);
        // }
        return $valid;
    }

    /**
     * Function checks whether an element can be assigned to an user.
     *
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
     *
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
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function uploads()
    {
        return $this->hasMany(Upload::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('order', 'ASC')->orderBy('created_at', 'DESC');
    }

    /**
     * Get a list of uploads under an element.
     *
     * @return mixed
     */
    public function latestUpload()
    {
        return $this->hasOne(Upload::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('created_at', 'DESC');
    }

    /**
     * Get a list of changes that happened to an element
     *
     * @return mixed
     */
    public function changes()
    {
        return $this->hasMany(Change::class, 'element_id')
            ->where('module_id', $this->module()->id)
            ->orderBy('created_at', 'DESC');
    }

    /**
     * Some modules like uploads, messages etc have a parent element under which that upload was made.
     * We call this linked element
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    // public function linkedElement()
    // {
    //     return $this->belongsTo(modelNameFromModuleId($this->module_id), 'element_id');
    // }

    /**
     * List of statusupdates
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    // public function statusupdates() {
    //     return $this->hasMany('Statusupdate', 'element_id')->where('module_id', $this->module()->id)->orderBy('created_at', 'DESC');
    // }

    /**
     * Get the last updated status
     *
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