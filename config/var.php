<?php

return [

    'app-name' => 'LetsBab',
    'tenant_field_identifier' => 'tenant_id',

    /*
   |--------------------------------------------------------------------------
   | File root
   |--------------------------------------------------------------------------
   | Example : /files/your-project-name/
   |
   */
    'file-upload-root' => '/files/letsbab/',
    /*
    |--------------------------------------------------------------------------
    | system tenant admin default email
    |--------------------------------------------------------------------------
    |
    | When a new customer(tenant) signs up a default tenant is created
    | which is to be used by system admin to log in an access the system on behalf
    | of the customer.
    |
    */
    'system-tenant-admin-email' => 'support@activationltd.com',

    /*
   |--------------------------------------------------------------------------
   | group id and name for tenant admin
   |--------------------------------------------------------------------------
   |
   | group id and title for tenant admin is used from config to reduce database query.
   | These is one of the group that is architecturally static.
   |
   |
   */
    // 'tenant-admin' => [
    //     'group-id' => '2',
    //     'group-title' => 'Seller'
    // ],

    // Defines what is user for login/
    'login-attribute' => 'email',

    'default-email-to' => 'letshelp@letsbab.com',

];
