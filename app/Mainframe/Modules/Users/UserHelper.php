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
     * @param $bearer_token
     * @return \App\Mainframe\Modules\Users\User|mixed|null
     */
    public static function ofBearer($bearer_token)
    {
        if ($bearer_token) {
            return User::where('auth_token', $bearer_token)->first();
        }

        return null;
    }

    /**
     * @param $token
     * @param $clientId
     * @return \App\Mainframe\Modules\Users\User|mixed|null
     */
    public static function ofXAuthToken($token, $clientId)
    {
        if ($token && $clientId) { // No logged user. get from user_id in url param or request header
            /** @noinspection PhpUndefinedMethodInspection */
            return User::where('api_token', $token)
                ->where('id', $clientId)
                ->remember(timer('short'))
                ->first();
        }

        return null;
    }

    /**
     * Resolve the API caller
     * @param $token
     * @param $clientId
     * @return null|\App\Mainframe\Modules\Users\User|mixed
     */
    public static function apiCaller($token, $clientId)
    {
        return User::ofXAuthToken($token, $clientId);
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
}