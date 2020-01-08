<?php
/*
|--------------------------------------------------------------------------
| Permission
|--------------------------------------------------------------------------
|
| Mainframe uses a permission config array. These are shown as option in
| groups details.
|
*/

return [
    /*
    |--------------------------------------------------------------------------
    | Default module permission
    |--------------------------------------------------------------------------
    |
    | The name of these permission keys should match what is in the
    | BaseModulePolicy.
    |
    */
    'module' => [
        'view-any' => 'View grid',  // viewAny()
        'view' => 'View details',   // view()
        'create' => 'Create',       // create()
        'update' => 'Update',       // update()
        'delete' => 'Delete',       // delete()
        'view-change-log' => 'Access change logs', //viewChangeLog()
        'view-report' => 'Report',  //viewReport()

        // Following policy functions are not included here
        // restore(), forceDelete().
    ],
    /*
    |--------------------------------------------------------------------------
    | Custom permissions
    |--------------------------------------------------------------------------
    |
    | These are permissions that are not related to modular architecture of
    | Mainframe. Here you can put new permission keys as they come up.
    |
    |
    */
    'custom' => [
        'widgets' => [
            'view-widgets' => 'View App tiles',
        ],
        'apis' => [
            'api' => 'API calls using Authentication token(X-Auth-Token)',
        ],
    ],
];
