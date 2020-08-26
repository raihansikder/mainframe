<?php

namespace App\Projects\MyProject\Modules\Users;

use App\Projects\MyProject\Modules\Clients\Client;
use Illuminate\Database\Eloquent\Builder;

/** @mixin \App\User  $this */
trait UserHelper
{

    /**
     * Check if user belongs to a reseller
     *
     * @return bool
     */
    public function ofReseller()
    {
        return $this->reseller_id;
    }

    /**
     * Check if user belongs to a client
     *
     * @return bool
     */
    public function ofClient()
    {
        return $this->client_id;
    }

    /**
     * Check if user belongs to a vendor
     *
     * @return bool
     */
    public function ofVendor()
    {
        return $this->vendor_id;
    }

    /**
     * Check if user is superuser=1/admin=18
     *
     * @return bool
     */

    public function isAdmin()
    {
        return ($this->isA('superuser'));
    }

    /**
     * Check if user is quote-user
     *
     * @return bool
     */

    public function isQuoteUser()
    {
        return ($this->isA('quote-user'));
    }

    /**
     * Check if user is mph-account
     *
     * @return bool
     */

    public function isMphAccount()
    {
        return ($this->isA('mph-account'));
    }

    /**
     * Reverse function for isAdmin
     *
     * @return bool
     */
    public function isNonAdmin()
    {
        return ! ($this->isAdmin() || $this->isAdminL2());
    }

    /**
     * Check if user is mph-admin-l2=25
     *
     * @return bool
     */
    public function isAdminL2()
    {
        return $this->isA('mph-admin-L2');
    }

    /**
     * Check if user is sales Admin
     *
     * @return bool
     */
    public function isSalesAdmin()
    {
        return $this->isA('sales-admin');
    }

    /**
     * Check if user is sales member
     *
     * @return bool
     */
    public function isSalesMember()
    {
        return $this->isA('sales-member');
    }

    /**
     * Check if user is mph-director
     *
     * @return bool
     */

    public function isDirector()
    {
        return ($this->isA('mph-director'));
    }

    /**
     * Check if user is mph-operations-manager
     *
     * @return bool
     */

    public function isOperationManager()
    {
        return ($this->isA('mph-operations-manager'));
    }

    /**
     * A list of client for the reseller
     *
     * @return array|null
     */
    public function clientListOfReseller()
    {
        if ($this->ofReseller()) {
            $clientIds = Client::where('reseller_id', $this->reseller_id)->pluck('id')->toArray();
            if (count($clientIds)) {
                return $clientIds;
            }
        }
        return null;
    }

    /**
     * Get admin users
     *
     * @return \App\User[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function adminUsers()
    {

        return \App\User::whereHas('groups', function (Builder $query) {
            $query->whereIn('group_id', [1, 18]);
        })->get();

    }

    /**
     * Get a list of admin user email. These will be used when some event
     * takes place in the system and admins sohuld be notified.
     *
     * @return \Illuminate\Config\Repository|mixed
     */
    public static function adminEmails()
    {
        return config('projects.my-project.config.default_email_recipients');
    }

    /**
     * Checks if the user is related to an element.
     *
     * @param  \Illuminate\Database\Eloquent\Model|mixed $element
     * @return bool
     */
    public function relatesToElement($element)
    {
        // Allow admin
        if ($this->isAdmin() || $this->isAdminL2()) {
            return true;
        }

        // Check for reseller match
        if ($this->ofReseller() && isset($element->reseller_id)
            && ($this->reseller_id == $element->reseller_id)) {
            return true;
        }
        // Check for client match
        if ($this->ofClient() && isset($element->client_id)
            && ($this->client_id == $element->client_id)) {
            return true;
        }

        // Check for vendor match
        if ($this->ofVendor() && isset($element->vendor_id)
            && ($this->vendor_id == $element->vendor_id)) {
            return true;
        }

        // check for creator/updater match
        if ($this->id == $element->created_by || $this->id == $element->updated_by) {
            return true;

        }
        if ($this->isSalesAdmin() || $this->isSalesMember()) {
            return true;
        }
        if ($this->isOperationManager()) {
            return true;
        }
        if ($this->isDirector()) {
            return true;
        }

        return false;
    }
}