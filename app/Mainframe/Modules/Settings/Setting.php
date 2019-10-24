<?php /** @noinspection PhpUndefinedMethodInspection */

namespace App\Mainframe\Modules\Settings;

use App\Mainframe\BaseModule;
use App\Observers\SettingObserver;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class Setting
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
 * @method static \Illuminate\Database\Query\Builder|\App\Setting onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Setting withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Setting withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\User $creator
 * @property-read \App\User $updater
 * @method static Builder|\App\Setting newModelQuery()
 * @method static Builder|\App\Setting newQuery()
 * @method static Builder|\App\Setting query()
 * @property string|null $title
 * @property string|null $type
 * @property string|null $description
 * @property string|null $value
 * @method static Builder|\App\Setting whereCreatedAt($value)
 * @method static Builder|\App\Setting whereCreatedBy($value)
 * @method static Builder|\App\Setting whereDeletedAt($value)
 * @method static Builder|\App\Setting whereDeletedBy($value)
 * @method static Builder|\App\Setting whereDescription($value)
 * @method static Builder|\App\Setting whereId($value)
 * @method static Builder|\App\Setting whereIsActive($value)
 * @method static Builder|\App\Setting whereName($value)
 * @method static Builder|\App\Setting whereTitle($value)
 * @method static Builder|\App\Setting whereType($value)
 * @method static Builder|\App\Setting whereUpdatedAt($value)
 * @method static Builder|\App\Setting whereUpdatedBy($value)
 * @method static Builder|\App\Setting whereUuid($value)
 * @method static Builder|\App\Setting whereValue($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Change[] $changes
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Upload[] $uploads
 * @property-read \App\Upload $latestUpload
 * @property-read int|null $changes_count
 * @property-read int|null $uploads_count
 */
class Setting extends BaseModule
{
    // use IsoModule;
    /**
     * Global setting can be stored in three different formats.Boolean, string and array.
     * Array value is stored as json
     *
     * @var array
     */
    public static $types = [
        'boolean' => 'Boolean',
        'string' => 'String',
        'array' => 'Array',
        'file' => 'File',
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
    protected $fillable = [
        'uuid',
        'name',
        'title',
        'type',
        'description',
        'value',
        'is_active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'deleted_by',
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
            // 'name' => [
            //     'required', 'between:1,100',
            //     Rule::unique('settings')->where(function ($query) {
            //         return $query->whereNull('deleted_at');
            //     })],
            'name' => 'required|between:1,255',
            'title' => 'required|between:1,255',
            'type' => 'required|'.'in:'.implode(',', array_keys(self::$types)),
            'desc' => 'between:1,2048',
            'is_active' => 'in:1,0',
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
        self::observe(SettingObserver::class);

        static::saving(function (Setting $element) {
            $valid = true;
            //
            // // type should be valid
            // if ($valid && ! in_array($element->type, keyAsArray(Setting::$types))) {
            //     $valid = setError("Type must be on the the following: ".csvFromArray(keyAsArray(Setting::$types)));
            // }
            // // for type=boolean only allow true/false as value
            // if ($valid && $element->type == 'boolean' && ! in_array($element->value, ['true', 'false'])) {
            //     $valid = setError("If boolean type is selected, value must be 'true' or 'false'");
            // }
            // // for type=array only allow JSON string as value
            // if ($valid && $element->type == 'array' && ! json_decode($element->value)) {
            //     $valid = setError("If array/json type is selected, value must be a valid json string");
            // }
            // // for type=array only allow JSON string as value
            // if ($valid && $element->type == 'file' && strlen(trim($element->value))) {
            //     $valid = setError("If the setting type is file leave the 'value' field empty.");
            // }

            return $valid;
        });

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
     * Get setting
     *
     * @param $name
     * @return array|bool|mixed|null|string
     */
    public static function read($name)
    {
        /** @var \App\Setting $setting */
        if ($setting = Setting::whereName($name)->remember(cacheTime('short'))->first()) {
            return $setting->settingValue();
        }

        return null;
    }

    /**
     * Function to get the setting value. The value can be boolean, string, array(json) or files
     */
    public function settingValue()
    {
        $val = $this->value;
        switch ($this->type) {
            case 'boolean':
                $val = $this->value == 'true' ? true : false;
                break;
            case 'string':
                $val = $this->value;
                break;
            case 'array':
                $val = json_decode($this->value, true);
                break;
            case 'file':
                $files = [];

                if ($this->uploads()->exists()) {

                    foreach ($this->uploads as $upload) {
                        $files[] = $upload->url;
                    }
                }
                $val = $files;
                break;
        }

        return $val;
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
