<?php
/**
 * Project specific config file.
 */
return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Mainframe'),

    /*
    |--------------------------------------------------------------------------
    | Application upload directory
    |--------------------------------------------------------------------------
    |
    | If the application uses local directory to store uploaded file then
    | it will use the following
    | any other location as required by the application or its packages.
    |
    */

    'upload_root' => '/files/',

    /*
    |--------------------------------------------------------------------------
    | Query cache
    |--------------------------------------------------------------------------
    |
    | Enable/Disable query cache.
    |
    */

    'query_cache' => env('QUERY_CACHE', false),

    /*
    |--------------------------------------------------------------------------
    | Allow web or api based registration for selected groups
    |--------------------------------------------------------------------------
    |
    | List of groups for which registration is allowed.
    |
    */

    // 'groups_allowed_for_registration' => [
    //     // 'superuser',
    //     // 'api',
    //     'tenant-admin',
    //     'project-admin',
    //     'artp-admin',
    //     'artp-buyer',
    //     'orhc-admin',
    //     'orhc-nurse',
    //     'orhc-patient',
    //     'orhc-family-member',
    //     // 'orhc-api',
    //     // 'artp-api',
    //     'test-group',
    //     'user'
    // ]

];
