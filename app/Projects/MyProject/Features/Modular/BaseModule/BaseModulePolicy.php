<?php
/**
 * Project specific BaseModule Policy class
 */

namespace App\Projects\MphMarket\Features\Modular\BaseModule;

use App\Mainframe\Features\Modular\BaseModule\BaseModulePolicy as MfBaseModulePolicy;

class BaseModulePolicy extends MfBaseModulePolicy
{
    /**
     * Runs before any of the other checks.
     *
     * @param \App\User $user
     * @param $ability
     * @return bool
     */
    public function before($user, $ability)
    {
        if (parent::before($user, $ability)) {
            return true;
        }
    }

    /**
     * Determine whether the user can view any items.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function viewAny($user)
    {

        if (! parent::viewAny($user)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view the item.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @return mixed
     */
    public function view($user, $element)
    {
        if (! parent::view($user, $element)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can create items.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule|mixed $element
     * @return mixed
     */
    public function create($user, $element = null)
    {
        if (! parent::create($user, $element)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can update the item.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @return mixed
     */
    public function update($user, $element)
    {
        if (! parent::update($user, $element)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can delete the item.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @return mixed
     */
    public function delete($user, $element)
    {
        if (! parent::delete($user, $element)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view change log of the item
     * In the code you can use both camelCase and kebab-case function name.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @return bool
     */
    public function viewChangeLog($user, $element)
    {
        if (! parent::viewChangeLog($user, $element)) {
            return false;
        }

        return true;
    }

    /**
     * Determine whether the user can view change log of the item
     * In the code you can use both camelCase and kebab-case function name.
     *
     * @param  \App\User $user
     * @param  \App\Mainframe\Features\Modular\BaseModule\BaseModule $element
     * @return bool
     */
    public function viewReport($user, $element)
    {
        if (! parent::viewReport($user, $element)) {
            return false;
        }

        return true;
    }

    /**
     * Check if user can access Api
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function api($user)
    {
        if (! parent::api($user)) {
            return false;
        }

        return true;
    }
}