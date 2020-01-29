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
    | File upload directory
    |--------------------------------------------------------------------------
    |
    | If the application uses local directory to store uploaded file then
    | it will use the following. The directory is relative to public.
    | Do not use a module name as directory name. This causes a
    | route url conflict.
    |
    */

    'upload_root' => env('UPLOAD_ROOT', 'files'), // public/files

    /*
    |--------------------------------------------------------------------------
    | Query cache
    |--------------------------------------------------------------------------
    |
    | Enable/Disable query cache.
    |
    */
    'query_cache' => env('QUERY_CACHE', false),
];
