<?php

namespace App\Mainframe\Modules\Users;

/** @mixin \App\Mainframe\Modules\Users\User $this */
trait UserHelper
{
    /**
     * Resolve name based on given input.
     *
     * @return \App\Mainframe\Modules\Users\UserHelper
     */
    public function resolveName()
    {
        /** @var \App\Mainframe\Modules\Users\User $this */
        $this->full_name = $this->first_name." ".$this->last_name;
        // No 'name' field is
        if (! isset($this->name)) {
            // $this->full_name = $this->first_name." ".$this->last_name;
            $this->name = $this->full_name;
        }

        return $this;
    }

    /**
     * Find user based on bearer token(auth_token)
     *
     * @param $id
     * @return \App\Mainframe\Modules\Users\User|mixed|null
     */
    public static function byId($id = null)
    {
        return User::active()->remember(timer('short'))->find($id);

    }

    /**
     * @param  null  $token
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object
     */
    public static function bearer($token = null)
    {
        $token = $token ?: request()->bearerToken();

        if ($token) {
            return User::active()
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
     * @return null|\App\Mainframe\Modules\Users\User|mixed
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
     * Generates auth_token (bearer token) for this user.
     *
     * @return bool|string
     */
    public function generateAuthToken()
    {
        \DB::table($this->table)->where('id', $this->id)->update(['auth_token' => $this->createAuthToken()]);

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
     * @return \App\Mainframe\Modules\Users\User
     */
    public static function guestInstance()
    {
        return new \App\User(['first_name' => 'guest']);
    }
}