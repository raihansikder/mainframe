<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App;

use App\Mainframe\BaseModule;
use App\Observers\ReportObserver;

/**
 * Class Report
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
 * @method static \Illuminate\Database\Query\Builder|\App\Report onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Report withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Report withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\User $creator
 * @property-read \App\User $updater
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report query()
 * @property string|null $code
 * @property string|null $title
 * @property string|null $description
 * @property string|null $parameters
 * @property string|null $type
 * @property string|null $version
 * @property int|null $module_id
 * @property int|null $is_module_default
 * @property string|null $tags
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read \App\Upload $latestUpload
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereIsModuleDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereModuleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereParameters($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereTenantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Report whereVersion($value)
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 */
class Report extends BaseModule
{
    // use IsoModule;
    /**
     * Custom validation messages.
     * @var array
     */
    // public static $customValidationMessages = [
    //     //'name.required' => 'Custom message.',
    // ];

    /**
     * Disallow from mass assignment. (Black-listed fields)
     * @var array
     */
    // protected $guarded = [];

    /**
     * Date fields
     * @var array
     */
    // protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    public static $types = [
        'Module Generic Report' => 'Module Generic Report',
    ];
    /**
     * Mass assignment fields (White-listed fields)
     * @var array
     */
    protected $fillable = [
        'uuid',
        'name',
        'tenant_id',
        'title',
        'description',
        'parameters',
        'type',
        'version',
        'module_id',
        'is_module_default',
        'tags',
        'is_active',
        'created_by',
        'updated_by',
        'deleted_by'
    ];

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
            'title' => 'required|between:1,255|unique:reports,title,'.(isset($element->id) ? "$element->id" : 'null').',id,deleted_at,NULL',
            'is_active' => 'required|in:1,0',
            // 'tenant_id'  => 'required|tenants,id,is_active,1',
            // 'created_by' => 'exists:users,id,is_active,1', // Optimistic validation for created_by,updated_by
            // 'updated_by' => 'exists:users,id,is_active,1',

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


    public static function boot()
    {
        parent::boot();
        Report::observe(ReportObserver::class);

        /************************************************************/
        // Following code block executes - when an element is in process
        // of creation for the first time but the creation has not
        // completed yet.
        /************************************************************/
        // static::creating(function (Report $element) { });

        /************************************************************/
        // Following code block executes - after an element is created
        // for the first time.
        /************************************************************/
        // static::created(function (Report $element) { });

        /************************************************************/
        // Following code block executes - when an already existing
        // element is in process of being updated but the update is
        // not yet complete.
        /************************************************************/
        // static::updating(function (Report $element) {});

        /************************************************************/
        // Following code block executes - after an element
        // is successfully updated
        /************************************************************/
        //static::updated(function (Report $element) {});

        /************************************************************/
        // Execute codes during saving (both creating and updating)
        /************************************************************/
        static::saving(function (Report $element) {
            $valid         = true;
            $element->name = $element->title;
            /************************************************************/
            //Your validation goes here
            // if($valid) $valid = $element->isSomethingDoable(true)
            /************************************************************/
            return $valid;
        });

        /************************************************************/
        // Execute codes after model is successfully saved
        /************************************************************/
        // static::saved(function (Report $element) {});

        /************************************************************/
        // Following code block executes - when some element is in
        // the process of being deleted. This is good place to
        // put validations for eligibility of deletion.
        /************************************************************/
        // static::deleting(function (Report $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully deleted.
        /************************************************************/
        // static::deleted(function (Report $element) {});

        /************************************************************/
        // Following code block executes - when an already deleted element
        // is in the process of being restored.
        /************************************************************/
        // static::restoring(function (Report $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully restored.
        /************************************************************/
        //static::restored(function (Report $element) {});
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
     * @param $id
     */
    // public static function someOtherAction($id) { }

    /**
     * Get module default report url.
     * @param $module_id
     * @return string
     */
    public static function defaultForModule($module_id)
    {
        /** @var \App\Report $default_report */
        $default_report = Report::where('module_id', $module_id)->where('is_module_default', 1)
            ->remember(cacheTime('long'))->first();

        if ($default_report) {
            $report_url = $default_report->url();
        } else {
            $module = Module::remember(cacheTime('long'))->find($module_id);
            $report_url = route($module->name.'.report')."?submit=Run&"
                ."select_columns_csv=id%2Cname%2Ccreated_by%2Ccreated_at%2Cupdated_by%2Cupdated_at%2Cis_active"
                ."&show_columns_csv=id%2Cname%2Ccreated_by%2Ccreated_at%2Cupdated_by%2Cupdated_at%2Cis_active"
                ."&alias_columns_csv=Id%2CName%2CCreated+by%2CCreated+at%2CUpdated+by%2CUpdated+at%2CActive%3F"
                ."&rows_per_page=25";

        }
        return $report_url;
    }

    /**
     * Get report full url
     * @return string
     */
    public function url()
    {
        $base_url = route('home');
        return $base_url.urldecode($this->parameters);

    }

    /**
     * Generates report url from id
     * @param $id
     * @return string
     */
    public static function getReportUrlFromId($id)
    {
        if ($report = Report::remember(cacheTime('short'))->find($id)) {
            return $report->url().'&report_name='.$report->name;
        }
        return false;
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
