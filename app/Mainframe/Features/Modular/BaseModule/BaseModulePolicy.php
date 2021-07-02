<?php

namespace App\Mainframe\Features\Modular\BaseModule;

use App\Module;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Str;

class BaseModulePolicy
{
    use HandlesAuthorization;

    public $moduleName;

    public function __construct()
    {
        $this->moduleName = $this->getModuleName();
    }

    /**
     * Get module name of the policy
     *
     * @return string
     */
    public function getModuleName()
    {
        return Str::plural(str_replace('-policies', '', Module::nameFromClass($this)));
    }

    /**
     * @param  string  $moduleName
     * @return BaseModulePolicy
     */
    public function setModuleName(string $moduleName)
    {
        $this->moduleName = $moduleName;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Policy functions
    |--------------------------------------------------------------------------
    */

    /**
     * Before
     * Runs before any of the other checks.
     *
     * @param  \App\User  $user
     * @param $ability
     * @return bool
     * @noinspection PhpUnusedParameterInspection
     */
    public function before($user, $ability)
    {
        if ($user->isSuperUser()) {
            return true;
        }
        // Do not return false.
    }

    /**
     * view-any
     * Determine whether the user can view any items.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny($user)
    {

        if (!$user->hasPermission($this->moduleName.'-view-any')) {
            return false;
        }

        return true;
    }

    /**
     * view
     * Determine whether the user can view the item.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function view($user, $element)
    {
        if (!$user->hasPermission($this->moduleName.'-view')) {
            return false;
        }

        if (!$element->isViewable()) {
            return false;
        }

        if (!$element->isTenantCompatible($user)) {
            return false;
        }

        return true;
    }

    /**
     * create
     * Determine whether the user can create items.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function create($user, $element = null)
    {
        if (!$user->hasPermission($this->moduleName.'-create')) {
            return false;
        }

        if ($element && !$element->isCreatable()) {
            return false;
        }

        if ($element && isset($element->tenant_id) && !$element->isTenantCompatible($user)) {
            return false;
        }

        return true;
    }

    /**
     * update
     * Determine whether the user can update the item.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function update($user, $element)
    {
        if (!$user->hasPermission($this->moduleName.'-update')) {
            return false;
        }

        if (!$element->isEditable()) {
            return false;
        }

        if (!$element->isTenantCompatible($user)) {
            return false;
        }

        /*--------------------------------------------------------------------------
        | Tenant Editabiilty Check
        |---------------------------------------------------------------------------
        | Sometimes and element may be set up as default for a tenant to use it as it is. ie. some
        | settings, report etc. These elements should be viewable but not editable.
        |--------------------------------------------------------------------------*/
        if ($user->tenant_id && $element->hasColumn('is_tenant_editable') && !$element->is_tenant_editable) {
            return false;
        }

        return true;
    }

    /**
     * delete
     * Determine whether the user can delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function delete($user, $element)
    {
        if (!$user->can('update', $element)) {
            return false;
        }

        if (!$user->hasPermission($this->moduleName.'-delete')) {
            return false;
        }

        if (!$element->isDeletable()) {
            return false;
        }

        if (!$element->isTenantCompatible($user)) {
            return false;
        }

        return true;
    }

    /**
     * restore
     * Determine whether the user can restore the item.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function restore($user, $element)
    {
        if (!$user->hasPermission($this->moduleName.'-restore')) {
            return false;
        }

        if (!$element->isRestorable()) {
            return false;
        }

        if (!$element->isTenantCompatible($user)) {
            return false;
        }

        return true;
    }

    /**
     * force-delete
     * Determine whether the user can permanently delete the item.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return mixed
     */
    public function forceDelete($user, $element)
    {
        if (!$user->hasPermission($this->moduleName.'-force-delete')) {
            return false;
        }

        if (!$element->isTenantCompatible($user)) {
            return false;
        }

        return true;
    }

    /**
     * view-change-log
     * Determine whether the user can view change log of the item
     * In the code you can use both camelCase and kebab-case function name.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return bool
     */
    public function viewChangeLog($user, $element)
    {
        if (!$user->hasPermission($this->moduleName.'-view-change-log')) {
            return false;
        }

        if (!$element->isTenantCompatible($user)) {
            return false;
        }

        return true;
    }

    /**
     * view-report
     * Determine whether the user can view change log of the item
     * In the code you can use both camelCase and kebab-case function name.
     *
     * @param  \App\User  $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed  $element
     * @return bool
     */
    public function viewReport($user, $element)
    {
        if (!$user->hasPermission($this->moduleName.'-view-report')) {
            return false;
        }

        // if (!$element->isTenantCompatible($user)) {
        //     return false;
        // }

        return true;
    }

    /**
     * api
     * Check if user can access Api
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function api($user)
    {
        if (!$user->hasPermission($this->moduleName.'-api')) {
            return false;
        }

        return true;
    }

}
