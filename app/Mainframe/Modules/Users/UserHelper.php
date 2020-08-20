<?php

namespace App\Mainframe\Modules\Users;

/** @mixin \App\User $this */
trait UserHelper
{
    /**
     * Resolve name based on given input.
     */
    public function resolveName()
    {
        /** @var \App\User $this */
        $this->full_name = $this->first_name." ".$this->last_name;
        // No 'name' field is
        if (! isset($this->name)) {
            // $this->full_name = $this->first_name." ".$this->last_name;
            $this->name = $this->full_name;
        }
    }

    /**
     * Find user based on bearer token(auth_token)
     *
     * @param $id
     * @return \App\User|mixed|null
     */
    public static function byId($id = null)
    {
        return \App\User::active()->remember(timer('short'))->find($id);

    }

    /**
     * @param  null  $token
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object
     */
    public static function bearer($token = null)
    {
        $token = $token ?: request()->bearerToken();

        if ($token) {
            return \App\User::active()
                ->where('auth_token', $token)
                ->remember(timer('short'))
                ->first();
        }

        // return Auth::guard('bearer')->user();
    }

    /**
     * Resolve the API caller
     *
     * @param  null|mixed  $token
     * @param  null|mixed  $clientId
     * @return null|\App\User|mixed
     */
    public static function apiAuthenticator($token = null, $clientId = null)
    {
        $token = $token ?: request()->header('X-Auth-Token');
        $clientId = $clientId ?: request()->header('client-id');

        if ($token && $clientId) {
            return \App\User::active()
                ->where('api_token', $token)
                ->remember(timer('short'))
                ->find($clientId);
        }
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
     * Handle a set of actions that result from a successful login.
     * i.e. update login timestamp. authToken if it is expired.
     */
    public function hasLoggedIn()
    {
        $this->updateLoginTimestamps();

        if ($this->authTokenHasExpired() || ! $this->auth_token) {
            $this->updateAuthToken();
        }

        return $this;
    }

    /**
     * Check if auth_token has expired.
     *
     * @return bool
     */
    public function authTokenHasExpired()
    {
        return $this->last_login_at->addMinutes(config('session.lifetime')) < now();
    }

    /**
     * Update login timestamps
     *
     * @return $this
     */
    public function updateLoginTimestamps()
    {

        $this->last_login_at = now();
        $updates = ['last_login_at' => now()];

        if (! $this->first_login_at) {
            $this->first_login_at = now();
            $updates['first_login_at'] = now();
        }

        User::where('id', $this->id)->update($updates);

        return $this;

    }

    /**
     * Generates auth_token (bearer token) for this user.
     *
     * @return bool|string
     */
    public function updateAuthToken()
    {
        User::where('id', $this->id)->update(['auth_token' => $this->createAuthToken()]);

        return $this;
    }

    /**
     * Create auth_token
     *
     * @return false|string
     */
    public function createAuthToken()
    {
        return substr(bcrypt($this->email.'|'.$this->password.'|'.date("Y-m-d H:i:s")), 10, 32);
    }

    public function ofTenant()
    {
        return $this->tenant_id ?: false;
    }

    /**
     * Create an empty guest user
     *
     * @return \App\User
     */
    public static function guestInstance()
    {
        return new \App\User(['first_name' => 'guest']);
    }

    /**
     * Check if user is guest
     *
     * @return bool
     */
    public function isGuest()
    {
        return $this->id ? false : true;
    }
}