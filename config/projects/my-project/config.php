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

    'name' => env('PROJECT', 'MyProject'),

    /*
    |--------------------------------------------------------------------------
    | Default Email CCs
    |--------------------------------------------------------------------------
    |
    | Some of the emails will go out to a number of admin user.
    |
    */

    'default_email_recipients' => [
        //'raihan@yantrait.com',
        //'kuldeep@yantrait.com',
        //'rifatshara@gmail.com',
        //'sanjidhabib@gmail.com'
        'su@mainframe',
    ],

    /*
    |--------------------------------------------------------------------------
    | Different email sender
    |--------------------------------------------------------------------------
    */

];
