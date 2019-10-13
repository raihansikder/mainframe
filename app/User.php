<?php

namespace App;

use App\Traits\IsoModule;
use App\Traits\LbUserTrait;
use App\Observers\UserObserver;
use App\Traits\IsoUserPermission;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use IsoModule;
    use IsoUserPermission;
    use LbUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'uuid',
        'tenant_id',
        'name',
        'email',
        'password',
        'remember_token',
        'email_confirmed',
        'email_confirmed_at',
        'email_confirmation_code',
        'access_token',
        'access_token_generated_at',
        'api_token',
        'api_token_generated_at',
        'tenant_editable',
        'permissions',
        'group_ids_csv',
        'group_titles_csv',
        'is_active',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
        'deleted_by',
        'partner_id',
        'partner_name',
        'charity_id',
        'charity_name',
        'name_initial',
        'first_name',
        'last_name',
        'full_name',
        'gender',
        'avatar_url',
        'profile_pic_url',
        'device_token',
        'address1',
        'address2',
        'city',
        'county',
        'country_id',
        'country_name',
        'zip_code',
        'phone',
        'mobile',
        'first_login_at',
        'last_login_at',
        'share_code',
        'transfer_method',
        'paypal_email',
        'payment_settings',
        'account_holder_name',
        'account_number',
        'account_type',
        'account_country',
        'account_city',
        'account_state',
        'account_post_code',
        'account_first_line',
        'sort_code',
        'abartn',
        'iban',
        'swift',
        'auth_token',
        'device_name',
        'current_app_version',
        'transferwise_account_id',
        'session_secret',
        'email_verified_at',
        'last_active_time',
        'last_login_time',
        'last_logout_time',
        'partner_uuid',
        'charity_uuid',
        'currency',
        'social_account_id',
        'social_account_type',
        'facebook_account_id',
        'twitter_account_id',
        'google_account_id',
        'instagram_account_id',
        'gift_aid_checked',
        'recommend_me',
        'transferwise_account',
        'brand_alerts_on',
        'charity_alerts_on',
        'commission_alerts_on',
        'settings_alerts_on',
        'babme_alerts_on',
        'news_alerts_on',
        'payment_country_id',
        'payment_country_name',
        'dob',
        'stat_total_commission_to_date_in_user_currency',
        'stat_total_commission_to_date_in_user_currency_formatted',
        'stat_total_commission_to_date_in_lb_currency',
        'stat_total_commission_to_date_in_lb_currency_formatted',
        'stat_total_amounts_paid_to_date_in_user_currency',
        'stat_total_amounts_paid_to_date_in_user_currency_formatted',
        'stat_total_amounts_paid_to_date_in_lb_currency',
        'stat_total_amounts_paid_to_date_in_lb_currency_formatted',
        'stat_amount_due_in_user_currency',
        'stat_amount_due_in_user_currency_formatted',
        'stat_amount_due_in_lb_currency',
        'stat_amount_due_in_lb_currency_formatted',
        'stat_total_donation_to_date_in_user_currency',
        'stat_total_donation_to_date_in_user_currency_formatted',
        'stat_total_donation_to_date_in_lb_currency',
        'stat_total_donation_to_date_in_lb_currency_formatted',
        'stat_donation_due_in_user_currency',
        'stat_donation_due_in_user_currency_formatted',
        'stat_donation_due_in_lb_currency',
        'stat_donation_due_in_lb_currency_formatted',
        'stat_no_of_recommendations',
        'stat_no_of_successful_recommendations',
        'stat_no_of_conversions',
        'stat_avg_buzz_of_rate',
        'stat_generated_at',
        'next_payment_on',
        'last_payment_on',
        'group_ids',
        'cookie_policy_acceptance',
        'instance_id',
        'is_test',
        'ios_rating',
        'android_rating',
        'has_sendbird_account',
        'bank_detail_update_reminder_sent',
        'installation_id',
        'ref_event',
        'referral_id',
        'signup_source',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['first_login_at', 'last_login_at', 'next_payment_on', 'created_at', 'updated_at', 'deleted_at'];
    /**
     * List of appended attribute. This attributes will be loaded in each Model
     *
     * @var array
     */
    protected $appends = ['avatar', 'has_banking_details', 'charity_settings_url', 'notification_settings'];

    /**
     * Allowed permissions values.
     * Possible options:
     *   -1 => Deny (adds to array, but denies regardless of user's group).
     *    0 => Remove.
     *    1 => Add.
     *
     * @var array
     */
    protected $allowedPermissionsValues = [-1, 0, 1];

    /**
     * Automatic eager load relation by default (can be expensive)
     *
     * @var array
     */
    protected $with = ['groups'];
    /** @var array Custom validation messages */
    public static $custom_validation_messages = [
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
            //'name' => ['required', 'between:3,255', 'unique:users,name' . (isset($element->id) ? ",$element->id" : '')],
            //'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email'.(isset($element->id) ? ",$element->id" : ''),
            //'email' => 'required|email|unique:users,email,' . (isset($element->id) ? "$element->id" : 'null') . ',id,deleted_at,NULL',
            'first_name' => 'required|between:0,128',
            'last_name' => 'required|between:0,128',
            'partner_id' => 'required_if:group_id,2',
            'charity_id' => 'required_if:group_id,5',
            //'group_ids' => 'required',
            'address1' => 'between:0,512',
            'address2' => 'between:0,512',
            'city' => 'between:0,64',
            'county' => 'between:0,64',
            'zip_code' => 'between:0,20',
            'phone' => 'between:0,20',
            'mobile' => 'between:0,20',
            'country_id' => 'required',
            'signup_source' => 'between:0,100',
            //'transfer_method' => 'in:' . implode(',', array_merge(Invoice::$transfer_methods, ['' => '-'])),
            //'password' => 'digits_between:5,8|numeric|confirmed',
            //'group_id' => 'required',
        ];

        // While creation/registration of user password and password_confirm both should be available
        // Also if one password is given the other one should be given as well
        // While creation/registration of user password and password_confirm both should be available
        if (! isset($element->id)) {
            $rules = array_merge($rules, [
                'password' => 'required|min:6|confirmed',
            ]);
        } else {
            if (Request::get('password')) {
                $rules = array_merge($rules, [
                    'password' => 'min:6|confirmed',
                ]);
            }
        }

        return array_merge($rules, $merge);
    }

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
        User::observe(UserObserver::class);

        /************************************************************/
        // Following code block executes - when an element is in process
        // of creation for the first time but the creation has not
        // completed yet.
        /************************************************************/
        static::creating(function (User $element) {
            if (! isset($element->is_test)) {
                $element->is_test = 0;
            }
            $element = $element->setAlerts();
        });

        /************************************************************/
        // Following code block executes - after an element is created
        // for the first time.
        /************************************************************/
        static::created(function (User $element) {
            // if ($element->inGroupIds([8])) {
            //     $element->sendRegistrationWithVerificationNotification();
            // }
            $notificationoptions = Notificationoption::where('is_active', 1)->get();
            foreach ($notificationoptions as $notificationoption) {
                Usernotificationoption::create([
                    'notificationoption_id' => $notificationoption->id,
                    'user_id' => $element->id,
                ]);
            }
        });

        /************************************************************/
        // Following code block executes - when an already existing
        // element is in process of being updated but the update is
        // not yet complete.
        /************************************************************/
        // static::updating(function (User $element) {});

        /************************************************************/
        // Following code block executes - after an element
        // is successfully updated
        /************************************************************/
        // static::updated(function (User $element) {});

        /************************************************************/
        // Execute codes during saving (both creating and updating)
        /************************************************************/
        static::saving(function (User $element) {

            $valid = true;
            $element = $element->resolveName();

            /**************************************************
             * Resolve group_id
             * If $user->group_id is set as an array somehow then convert it to json
             * Store a groups in a temporary array var $groups.
             */

            if (is_array($element->group_ids)) {
                $group_ids = $element->group_ids;
                $element->group_ids = json_encode($element->group_ids);
            } else {
                $group_ids = json_decode($element->group_ids);
            }

            // Set group selection limit
            $max_groups = 1;
            if (is_array($group_ids) && (count($group_ids) > $max_groups)) {
                $valid = setError("You can assign only {$max_groups} group.");
            }
            if (is_array($group_ids) && count($group_ids)) {
                $element->group_ids_csv = implode(',', Group::whereIn('id', $group_ids)->pluck('id')->toArray());
                $element->group_titles_csv = implode(',', Group::whereIn('id', $group_ids)->pluck('title')->toArray());
            }
            /**************************************************/

            // There is a partner_id but this users group is not one of partner
            // if ($element->partner_id) {
            //     // if (!$element->ofPartner() && $element->isRecommender()) {
            //     //     $valid = setMessage('Partner(brand) is discarded because the user group is not compatible.');
            //     //     $element->partner_id = null;
            //     // }
            // }

            // There is a charity_id but this users group is not one of partner
            if ($element->charity_id && ! $element->ofCharity()) {
                $valid = setMessage('Charity is discarded because the user group is not compatible.');
                $element->charity_id = null;
            }

            if ($element->isRecommender() && ! $element->hasValidBankDetails()) {
                $valid = setError('Banking details not valid');
            }

            // fill common fields, null-fill, trim blanks from Request
            if ($valid) {
                /**
                 * If email is confirmed then
                 */

                if (! isset($element->is_active)) {
                    $element->is_active = ($element->email_confirmed == 1) ? 1 : 0;
                }

                // Generate a share_code if it doesn't exist already.
                if (! isset($element->share_code)) {
                    $element->share_code = randomString(22).time();
                }

                // Fill country, currency
                if ($element->country()->exists()) {
                    $country = $element->country;
                    $element->country_name = $country->name;
                    $element->currency = $country->currency();
                    $element->account_country = $country->iso2;
                }

                // Fill partner fields
                if ($element->partner()->exists()) {
                    $partner = $element->partner;
                    $element->partner_uuid = $partner->uuid;
                    $element->partner_name = $partner->name;
                }

                // Fill charity fields
                if ($element->charity()->exists()) {
                    $charity = $element->charity;
                    $element->charity_uuid = $charity->uuid;
                    $element->charity_name = $charity->name;
                }

                $element->email_confirmed = (! $element->email_confirmed) ? 0 : 1;
                if ($element->email_confirmed && $element->email_verified_at === null) {
                    $element->email_verified_at = now();
                }
                //filling transfer_method field
                $element->getTransferMethodOfUser();

                //filling last_active_time,last_login_time,last_logout_time fields ;default will be updated_at value
                $element->last_active_time = (! $element->last_active_time) ? $element->updated_at : $element->last_active_time;
                $element->last_login_time = (! $element->last_login_time) ? $element->updated_at : $element->last_login_time;
                $element->last_logout_time = (! $element->last_logout_time) ? $element->updated_at : $element->last_logout_time;
            }

            return $valid;
        });

        /************************************************************/
        // Execute codes after model is successfully saved
        /************************************************************/
        static::saved(function (User $element) {
            // Sync partner_category table
            $element->groups()->sync(json_decode($element->group_ids));
            // $element->updateGroups($element->group_ids_csv); // Todo: remove!

            if ($element->avatar_url) {
                if (isset($element->social_account_type) && ! is_null($element->social_account_type) && is_null($element->country_id)) {
                    $upload = new Upload;
                    $upload->module_id = $element->module()->id;
                    $upload->element_id = $element->id;
                    $upload->type = 'Avatar';
                    $upload->path = $element->avatar_url;
                    $element->uploads()->save($upload);
                }
            }

            /**
             * Send password change notification to user
             *********************************************/
            if (Session::has('just_changed_password')) {
                userChangedPasswordNotification($element);
                Session::forget('just_changed_password');
            }
            // Create a Userdetails if does not exists
            // if (!count($element->userdetail)) {
            //     Userdetail::create(['user_id' => $element->id, 'name' => $element->name]);
            // }

            //Todo: Expensive operation
            if ($element->isRecommender()) {
                $element->updateStats();
            }

            // Todo: Remove after update existing.
            // $notificationoptions = Notificationoption::where('is_active', 1)->get();
            // foreach ($notificationoptions as $notificationoption) {
            //     Usernotificationoption::create([
            //         'notificationoption_id' => $notificationoption->id,
            //         'user_id' => $element->id,
            //     ]);
            // }

        });

        /************************************************************/
        // Following code block executes - when some element is in
        // the process of being deleted. This is good place to
        // put validations for eligibility of deletion.
        /************************************************************/
        // static::deleting(function (User $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully deleted.
        /************************************************************/
        // static::deleted(function (User $element) {});

        /************************************************************/
        // Following code block executes - when an already deleted element
        // is in the process of being restored.
        /************************************************************/
        // static::restoring(function (User $element) {});

        /************************************************************/
        // Following code block executes - after an element is
        // successfully restored.
        /************************************************************/
        //static::restored(function (User $element) {});
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
     * Set initial alerts
     *
     * @return $this
     */
    public function setAlerts()
    {
        $this->brand_alerts_on = 1;
        $this->charity_alerts_on = 1;
        $this->commission_alerts_on = 1;
        $this->settings_alerts_on = 1;
        $this->babme_alerts_on = 1;
        $this->news_alerts_on = 1;

        return $this;
    }

    /**
     * Resolve name based on given input.
     */
    public function resolveName()
    {
        $this->full_name = $this->first_name." ".$this->last_name;
        // No 'name' field is
        if (! isset($this->name)) {
            // $this->full_name = $this->first_name." ".$this->last_name;
            $this->name = $this->full_name;
        }

        return $this;
    }

    /**
     * resolve the transfer method of user
     */
    public function getTransferMethodOfUser()
    {
        $this->transfer_method = null;
        if (isset($this->account_number) && $this->country_id == '187') {//country_id='187'=UK
            $this->transfer_method = 'NatWest';
        } else {
            if (isset($this->account_number)) {
                $this->transfer_method = 'TransferWise';
            } else {
                if (isset($this->paypal_email)) {
                    $this->transfer_method = 'Paypal';
                }
            }
        }

        return $this->transfer_method;
    }

    /**
     * Checks if user belongs to a charity
     *
     * @return bool
     */
    public function ofCharity()
    {
        return $this->inGroupIds(Group::charityGroupIds());
    }

    /**
     * Checks if user is a recommender
     *
     * @return bool
     */
    public function isRecommender()
    {
        return $this->inGroupIds(Group::recommenderGroupIds());
    }

    /**
     * Checks if Bank details are valid
     *
     * @param  bool  $set_msg
     * @return bool
     */
    public function hasValidBankDetails($set_msg = true)
    {
        $valid = true;

        // If account_country is given it should not be more than two characters.
        if (isset($this->account_country)) {
            if (strlen($this->account_country) > 2) {
                $valid = setError('Account country should be 2 characters', $set_msg);
            }
        }

        // Todo: May be we shall need more validation here

        return $valid;
    }

    /**
     * Find user based on bearer token(auth_token)
     *
     * @param $bearer_token
     * @return mixed|null
     */
    public static function ofBearer($bearer_token)
    {
        // $user = null;
        // // Try to find the user.
        // if (\Cache::has('user' . $bearer_token)) {
        //     $user = \Cache::get('user' . $bearer_token);
        // } else {
        //     $minutes = now()->addMinutes(60);
        //     $user = \Cache::remember('user' . $bearer_token, $minutes, function () use ($bearer_token) {
        //         return User::where('auth_token', $bearer_token)->first();
        //     });
        // }
        // return $user;

        if ($bearer_token) {
            return User::where('auth_token', $bearer_token)->first();
        }

        return null;
    }

    /**
     * Construct address
     *
     * @return string
     */
    public function address()
    {
        $str = '';

        $fields = [
            'address1',
            'address2',
            'city',
            'county',
            'country_name',
            'zip_code'
        ];

        foreach ($fields as $field) {
            if (strlen($this->$field)) {
                $str .= $this->$field.', ';
            }
        }

        return trim($str, ', ');
    }

    /**
     * Generates auth_token (bearer token) for this user.
     *
     * @return bool|string
     */
    public function generateAuthToken()
    {
        return substr(bcrypt($this->email.'|'.$this->password.'|'.date("Y-m-d H:i:s")), 10, 32);
    }

    /**
     * Email notification sent to user when he logs in for the first time.
     */
    public function sendRegistrationWithVerificationNotification()
    {
        userRegistrationWithVerificationNotification($this);
    }

    /**
     * Email notification sent to user when he logs in for the first time.
     */
    public function sendPartnerUserRegistrationEmailWithVerification()
    {
        partnerUserRegistrationEmailWithVerification($this);
    }

    /**
     * Email notification sent to user when he logs in for the first time.
     */
    public function firstLoginNotification()
    {
        userFirstLoginNotification($this);
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        emailVerificationNotification($this);
        //$this->notify(new Notifications\VerifyEmail);
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     */
    public function sendPasswordResetNotification($token)
    {
        //$this->notify(new ResetPasswordNotification($token));
        resetPasswordNotification($this, $token);
    }

    /**
     * Checks if user belongs to super admin group.
     * This function is created with an idea so that some more admin groups i.e. LB-admin, LB-accounts
     * etc can be covered/included in this same group.
     *
     * @return bool
     */
    public function ofSuperadminGroup()
    {
        return $this->inGroupIds(Group::superadminGroupIds());
    }

    /**
     * Checks if user belongs to a partner/brand
     *
     * @return bool
     */
    public function ofPartner()
    {
        return $this->inGroupIds(Group::partnerGroupIds());
    }

    /**
     * Checks if user is a first line support
     *
     * @return bool
     */
    public function isFirstLineSupport()
    {
        return $this->inGroupIds(Group::firstlinesupportGroupIds());
    }

    /**
     * Checks if user is a first line support
     *
     * @return bool
     */
    public function isLBAccounts()
    {
        return $this->inGroupIds(Group::lbAccountsGroupIds());
    }

    /**
     * Checks if user is a first line support
     *
     * @return bool
     */
    public function isLBReadOnlyUser()
    {
        return $this->inGroupIds(Group::lbReadOnlyUser());
    }

    /**
     * Checks if user is a lb admin user
     *
     * @return bool
     */
    public function isLBAdminUser()
    {
        return $this->inGroupIds(Group::lbAdminUser());
    }

    /**
     * Checks if user is a lb daily task user
     *
     * @return bool
     */
    public function isLBDailyTaskUser()
    {
        return $this->inGroupIds(Group::lbDailyTaskUser());
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
        if (! spyrElementViewable($this, $user_id, $set_msg)) {
            return false;
        }
        // Allow super user
        if ($user->isSuperUser()) {
            return true;
        }
        // Allow partner users of same partner
        if ($user->ofPartner()) {
            return $user->partner->isViewable();
        }
        // Allow partner users of same partner
        if ($user->ofCharity()) {
            return $user->charity->isViewable();
        }
        // Allow first line support user
        if ($user->isFirstLineSupport()) {
            return true;
        }
        // Allow lb read only user user;https://letsbab.atlassian.net/browse/LB-247
        if ($user->isLBReadOnlyUser()) {
            return true;
        }
        // Allow lb admin user;https:https://letsbab.atlassian.net/browse/LB-506
        if ($user->isLBAdminUser()) {
            return true;
        }
        // Allow lb daily task user;https:https://letsbab.atlassian.net/browse/LB-506
        if ($user->isLBDailyTaskUser()) {
            return true;
        }

        return false;
    } // Need to put it explicitly because u >g

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

    # Default relationships already available in base Class 'Basemodule'
    //public function updater() { return $this->belongsTo('User', 'updated_by'); }
    //public function creator() { return $this->belongsTo('User', 'created_by'); }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country() { return $this->belongsTo(Country::class); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function partner() { return $this->belongsTo(Partner::class); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function charity() { return $this->belongsTo(Charity::class); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups() { return $this->belongsToMany(Group::class, 'user_group'); }






    // Write new relationships below this line

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function notificationoptions() { return $this->belongsToMany(Notificationoption::class, 'usernotificationoptions'); }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usernotificationoptions() { return $this->hasMany(Usernotificationoption::class, 'user_id'); }

    /**
     * Get the last uploaded avatar
     */
    public function avatar()
    {
        return $this->uploads->where('type', 'Avatar')->first();
    }


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

    /**
     * Mutator for taking permissions.
     *
     * @param  array  $permissions
     * @return string
     */
    public function setPermissionsAttribute(array $permissions)
    {
        // Merge permissions
        /** @noinspection PhpParamsInspection */
        $permissions = array_merge($this->permissions, $permissions);

        // Loop through and adjust permissions as needed
        foreach ($permissions as $permission => &$value) {
            // Lets make sure there is a valid permission value
            if (! in_array($value = (int) $value, $this->allowedPermissionsValues)) {
                throw new InvalidArgumentException("Invalid value [$value] for permission [$permission] given.");
            }

            // If the value is 0, delete it
            if ($value === 0) {
                unset($permissions[$permission]);
            }
        }

        $this->attributes['permissions'] = (! empty($permissions)) ? json_encode($permissions) : '';
    }

    /**
     * avatar
     *
     * @return null|string
     */
    public function getAvatarAttribute()
    {
        if ($this->avatar()) {
            return $this->avatar()->url;
        }

        return null;
    }

    /**
     * Mutator for giving permissions.
     *
     * @param  mixed  $permissions
     * @return array  $_permissions
     */
    public function getPermissionsAttribute($permissions)
    {
        if (! $permissions) {
            return [];
        }

        if (is_array($permissions)) {
            return $permissions;
        }

        if (! $_permissions = json_decode($permissions, true)) {
            throw new InvalidArgumentException("Cannot JSON decode permissions [$permissions].");
        }

        return $_permissions;
    }

    /**
     * avatar
     *
     * @return null|string
     */
    public function getCharitySettingsUrlAttribute()
    {
        return route('users.charity-settings')."?email=".$this->email."&token=".Hash::make($this->auth_token);
    }

    /**
     * has_banking_details
     *
     * @return int
     */
    public function getHasBankingDetailsAttribute()
    {
        if ($this->account_number == null && $this->paypal_email == null) {
            return 0;
        }

        return 1;
    }

    /**
     * notification_settings
     *
     * @return array
     */
    public function getNotificationSettingsAttribute()
    {
        $user_notificationoption_ids = $settings = [];

        foreach ($this->usernotificationoptions as $user_notificationoption) {
            $user_notificationoption_ids[] = $user_notificationoption->notificationoption_id;//specific user's notificationoptions
        }
        //getting all active notificationoptions
        $notificationoptions = Notificationoption::where('is_active', 1)->orderBy('order')->get();
        foreach ($notificationoptions as $notificationoption) {
            $code = $notificationoption->code;
            $settings[] = [
                'id' => $notificationoption->id,
                'key' => $code,
                'order' => $notificationoption->order,
                'title' => $notificationoption->name,
                'value' => (in_array($notificationoption->id, $user_notificationoption_ids)) ? 1 : 0,
            ];
        }

        return $settings;
    }

}
