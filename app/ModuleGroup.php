<?php

namespace App;

use App\Mainframe\Helpers\Modular\BaseModule\BaseModule;
use App\Observers\ModulegroupObserver;

/**
 * Class ModuleGroup
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
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\ModuleGroup withoutTrashed()
 * @mixin \Eloquent
 * @property string|null $title
 * @property string|null $description
 * @property int|null $parent_id
 * @property int|null $level
 * @property int|null $order
 * @property string|null $default_route
 * @property string|null $color_css
 * @property string|null $icon_css
 * @property-read \App\User|null $creator
 * @property-read \App\User|null $updater
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereColorCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDefaultRoute($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereIconCss($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ModuleGroup whereUuid($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read \App\Upload $latestUpload
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 */
class ModuleGroup extends BaseModule
{
    /**
     * Custom validation messages.
     *
     * @var array
     */
    public static $customValidationMessages = [
        //'name.required' => 'Custom message.',
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
     * Mass assignment fields (White-listed fields)
     *
     * @var array
     */
    protected $fillable = ['name', 'title', 'description', 'parent_id', 'level', 'order',
        'color_css', 'icon_css', 'default_route', 'is_active', 'created_by', 'updated_by', 'deleted_by'];

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     * Example: 'name' => ['required', 'Regex:/^[A-Za-z0-9\-! ,\'\"\/@\.:\(\)]+$/']
     *
     * @param       $element
     * @param array $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'name' => ['required', 'between:1,255', 'unique:module_groups,name,' . (isset($element->id) ? "$element->id" : 'null') . ',id,deleted_at,NULL', 'Regex:/^[a-z\-]+$/'],
            'title' => 'required|between:1,255|unique:module_groups,title,' . (isset($element->id) ? "$element->id" : 'null') . ',id,deleted_at,NULL',
            //'parent_id' => 'integer|between:1,255|unique:module_groups,parent' . (isset($element->id) ? ",$element->id" : ''),
            // 'created_by' => 'integer|exists:users,id,is_active,1',
            // 'updated_by' => 'integer|exists:users,id,is_active,1',
            'is_active' => 'required|in:0,1',
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
        /**
         * parent::boot() was previously used. However this invocation stops from the other classes
         * of other spyr modules(Models) to override the boot() method. Need to check more.
         * make the parent (Eloquent) boot method run.
         */
        parent::boot();
        //BaseModule::registerObserver(get_class()); // register observer
        // ModuleGroup::observe(ModulegroupObserver::class);

        /************************************************************/
        // Following code block executes - when an element is in process
        // of creation for the first time but the creation has not
        // completed yet.
        /************************************************************/
        // static::creating(function (ModuleGroup $element) { });

        /************************************************************/
        // Following code block executes - after an element is created
        // for the first time.
        /************************************************************/
        // static::created(function (ModuleGroup $element) { });

        /************************************************************/
        // Following code block executes - when an already existing
        // element is in process of being updated but the update is
        // not yet complete.
        /************************************************************/
        // static::updating(function (ModuleGroup $element) {});

        /************************************************************/
        // Following code block executes - after an element
        // is successfully updated
        /************************************************************/
        //static::updated(function (ModuleGroup $element) {});

        /************************************************************/
        // Execute codes during saving (both creating and updating)
        /************************************************************/
        static::saving(function (ModuleGroup $element) {
            $valid = true;
            /************************************************************/
            // Your validation goes here
            // if($valid) $valid = $element->isSomethingDoable(true)
            /************************************************************/
            if ($valid) {
                // Fill default values
                $element->parent_id = (!$element->parent_id) ? 0 : $element->parent_id;
                $element->level = (!$element->level) ? 0 : $element->level;
                $element->order = (!$element->order) ? 0 : $element->order;
                $element->default_route = (!$element->default_route) ? $element->name . '.index' : $element->default_route;
                $element->color_css = (!$element->color_css) ? 'aqua' : $element->color_css;
                $element->icon_css = (!$element->icon_css) ? 'fa fa-plus' : $element->icon_css;
            }
            return $valid;
        });

        /************************************************************/
        // Execute codes after model is successfully saved
        /************************************************************/
        // static::saved(function (ModuleGroup $element) {});

        /************************************************************/
        // Following code block executes - when some element is in
        // the process of being deleted. This is good place to
        // put validations for eligibility of deletion.
        /************************************************************/
        // static::deleting(function (ModuleGroup $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully deleted.
        /************************************************************/
        // static::deleted(function (ModuleGroup $element) {});

        /************************************************************/
        // Following code block executes - when an already deleted element
        // is in the process of being restored.
        /************************************************************/
        // static::restoring(function (ModuleGroup $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully restored.
        /************************************************************/
        //static::restored(function (ModuleGroup $element) {});
    }

    ############################################################################################
    # MainframeModelValidator functions
    ############################################################################################

    /**
     * @param bool|false $setMsgSession setting it false will not store the message in session
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
     * An array of menu
     *
     * @return array
     */
    public static function tree()
    {
        /** @var \App\ModuleGroup $moduleGroups */
        $moduleGroups = ModuleGroup::whereIsActive(1)->whereParentId(0)->orderBy('order')->remember(cacheTime('long'))->get();
        $list = [];
        foreach ($moduleGroups as $moduleGroup) {
            if (count($moduleGroup->children()))
                $list[] = ['type' => 'module_group', 'item' => $moduleGroup, 'children' => $moduleGroup->children()];
            else
                $list[] = ['type' => 'module_group', 'item' => $moduleGroup, 'children' => []];
        }
        $modules = Module::whereModuleGroupId(0)->whereIsActive(1)->orderBy('order')->remember(cacheTime('long'))->get();
        if (count($modules)) {
            foreach ($modules as $module) {
                $list[] = ['type' => 'module', 'item' => $module];
            }
        }
        return $list;
    }

    /**
     * Get children modules and module_groups
     *
     * @return array
     */
    public function children()
    {
        $list = [];

        $moduleGroups = ModuleGroup::whereParentId($this->id)->whereIsActive(1)->orderBy('order')->remember(cacheTime('long'))->get();
        if (count($moduleGroups)) {
            foreach ($moduleGroups as $moduleGroup) {

                if (count($moduleGroup->children()))
                    array_push($list, ['type' => 'module_group', 'item' => $moduleGroup, 'children' => $moduleGroup->children()]);
                else
                    array_push($list, ['type' => 'module_group', 'item' => $moduleGroup, 'children' => []]);
            }
        }
        $modules = Module::whereModuleGroupId($this->id)->whereIsActive(1)->orderBy('order')->remember(cacheTime('long'))->get();
        if (count($modules)) {
            foreach ($modules as $module) {
                array_push($list, ['type' => 'module', 'item' => $module]);
            }
        }
        return $list;
    }

    /**
     * Get module_group names as one-dimentional array
     *
     * @param bool|true $only_active
     * @return array
     */
    public static function names($only_active = true)
    {
        $q = ModuleGroup::select('name');
        if ($only_active) {
            $q = $q->remember(cacheTime('very-long'))->where('is_active', 1);
        }
        $results = $q->get()->toArray();
        $modules = array_column($results, 'name');
        return $modules;
    }

    /**
     * get first level children of a module group
     *
     * @return array
     */
    public function firstLevelChildren()
    {
        $list = [];
        $moduleGroups = ModuleGroup::whereParentId($this->id)->whereIsActive(1)->orderBy('order')->remember(cacheTime('very-long'))->get();
        if (count($moduleGroups)) {
            foreach ($moduleGroups as $moduleGroup) {
                array_push($list, ['type' => 'module_group', 'item' => $moduleGroup]);
            }
        }
        $modules = Module::whereModuleGroupId($this->id)->whereIsActive(1)->orderBy('order')->remember(cacheTime('very-long'))->get();
        if (count($modules)) {
            foreach ($modules as $module) {
                array_push($list, ['type' => 'module', 'item' => $module]);
            }
        }
        return $list;
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
     * @param null $user_id
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
     * @param null $user_id
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
     * @param null $user_id
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
     * @param null $user_id
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
