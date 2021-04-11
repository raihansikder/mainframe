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
    | BaseModulePolicy. Following policy functions are not included here
    | restore, forceDelete.
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
            'make-api-call' => 'API calls using Authentication token(X-Auth-Token)',
        ],
        'report' => [
            'report-name' => 'Run this report',
        ],
    ],
];
