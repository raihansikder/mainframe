<?php
/** @noinspection PhpUnusedLocalVariableInspection */

/** @noinspection PhpUnusedParameterInspection */

namespace App\Mainframe\Modules\Users\Traits;

use App\Country;
use App\Mainframe\Modules\Users\UserProcessor;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

/** @mixin UserProcessor $this */
trait UserProcessorTrait
{
    /* Further customize immutables and allowed value transitions*/
    // public function getImmutables(){return $this->immutables; }
    // public function getTransitions(){return $this->transitions; }

    /**
     * Pre-fill model before running rule based validations
     *
     * @param  \App\User  $element
     * @return $this
     */
    public function fill($element)
    {
        $element->group_ids = \Arr::wrap($element->group_ids);
        $element->populate();
        $this->fillApiTokenGeneratedAt();

        return $this;
    }

    /**
     * Validation rules. For regular expression validation use array instead of pipe
     *
     * @param  \App\User  $element
     * @param  array  $merge
     * @return array
     */
    public static function rules($element, $merge = [])
    {
        $rules = [
            'email' => 'required|email|'.Rule::unique('users', 'email')->ignore($element->id)->whereNull('deleted_at'),
            'first_name' => 'required|between:0,128',
            'last_name' => 'required|between:0,128',
            'group_ids' => 'required',
            'address1' => 'between:0,512',
            'address2' => 'between:0,512',
            'city' => 'between:0,64',
            'county' => 'between:0,64',
            'zip_code' => 'between:0,20',
            'phone' => 'between:0,20',
            'mobile' => 'between:0,20',
            'gender' => 'between:0,32',
            'dob' => 'nullable|date:Y-m-d|before:'.date("Y-m-d", strtotime("-18 years")),
        ];

        return array_merge($rules, $merge);
    }

    /* Further customize error messages and attribute names by overriding */
    // public function customErrorMessages($merge = [])
    // public static function customAttributes($merge = [])

    /*
    |--------------------------------------------------------------------------
    | Execute calculations, validations and actions on different events
    |--------------------------------------------------------------------------
    */

    /**
     * Run validations for saving. This should be common for both creating and updating.
     *
     * @param  \App\User  $element
     * @return $this
     */
    public function saving($element)
    {

        $this->userMustHaveOneGroup()
            ->userCanNotHaveMultipleGroup()
            ->restrictFieldsBasedOnUserGroups()
            ->userCanNotAssignIrrelevantGroup();

        $this->fillCountryBasedOnCountryCode();

        return $this;
    }
    // public function creating($element) { return $this; }
    // public function updating($element) { return $this; }
    // public function created($element) { return $this; }
    // public function updated($element) { return $this; }
    // public function saved($element) { return $this; }
    // public function deleting($element) { return $this; }
    // public function deleted($element) { return $this; }

    /*
    |--------------------------------------------------------------------------
    | Functions
    |--------------------------------------------------------------------------
    |
    */
    /**
     * Some times an App or Api will pass a iso2 country code. i.e. GB, US. This needs
     *  to be checked against existing country DB and
     *
     * @return $this
     */
    public function fillCountryBasedOnCountryCode()
    {
        if (!request('country_code')) {
            return $this;
        }

        $country = Country::where('iso2', request('country_code'))->remember(timer('very-long'))->first();

        if (!$country) {
            $this->error("Country code ".request('country_code')." is not valid");

            return $this;
        }

        $this->element->country_id = $country->id;

        return $this;
    }

    /**
     * Fill api_token_generated_at
     */
    public function fillApiTokenGeneratedAt()
    {
        $user = $this->element;
        if ($user->api_token != $this->original('api_token')) {
            $user->api_token_generated_at = Carbon::now();
        }

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Validation helper functions
    |--------------------------------------------------------------------------
    */

    /**
     * @return $this
     */
    public function userCanNotHaveMultipleGroup()
    {
        $user = $this->element;
        if (count($user->group_ids) > 1) {
            $this->fieldError('group_ids', "User can have one group selected");
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function userMustHaveOneGroup()
    {
        $user = $this->element;
        if (!is_array($user->group_ids) || !count($user->group_ids)) {
            $this->fieldError('group_ids', "User must have one group selected");
        }

        return $this;
    }

    /**
     * @return $this
     */
    public function restrictFieldsBasedOnUserGroups()
    {
        $user = $this->element;
        // if (user()->inGroupIds(['19', '20', '22', '23']) && $user->email_verified_at != $user->getOriginal('email_verified_at')) {
        //     $this->fieldError('group_ids', "Partner, Client and Vendor admin or user can not edit email verification at field");
        // }

        return $this;
    }

    /**
     * @return $this
     */
    public function userCanNotAssignIrrelevantGroup()
    {
        $user = $this->element;

        //user is sales admin
        // if (user()->isSalesAdmin() && ! in_array($user->group_ids[0], ['19', '20', '21', '22', '23', '28', '29'])) {
        //     $this->fieldError('group_ids', "Sales admin can only create resellers, vendors, sales admin,sales user or client user");
        // }
        return $this;
    }
}