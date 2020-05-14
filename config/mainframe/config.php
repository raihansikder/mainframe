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
    | Date format
    |--------------------------------------------------------------------------
    |
    | The format this used in showDate function
    |
    */

    'date_format' => env('DATE_FORMAT', 'd-m-Y'),
    'datetime_format' => env('DATETIME_FORMAT', 'd-m-Y H:i:s'),

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
    | Load default mainframe routes
    |--------------------------------------------------------------------------
    |
    | You can enable/disable loading of some of the mainframe default routes.
    |
    */
    'routes' => [
        'web' => [
            'app/Mainframe/routes/auth.php',
            'app/Mainframe/routes/modules.php',
            'app/Mainframe/routes/web.php'
        ],
        'api' => [
            'app/Mainframe/routes/api.php'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Load additional CSS and JS file
    |--------------------------------------------------------------------------
    |
    | Projects may have additional CSS/JS files which needs to be included
    |
    */
    'load' => [
        'css' => [
            'projects/project-name/css/project-name.css',
        ],
        'js' => [
            //'projects/project-name/css/project-name.js',
        ],
    ],
];
