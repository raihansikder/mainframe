<?php

namespace App\Mainframe\Modules\Users;

use App\Mainframe\Modules\Groups\Group;

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
     * @return mixed|null
     */
    public static function ofBearer($bearer_token)
    {
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



    public function ofTenant()
    {
        return $this->tenant_id ?: false;
    }
}