<?php
/*
|--------------------------------------------------------------------------
| Addl-permissions types field
|--------------------------------------------------------------------------
|
| Additional permissions can be categories into different types. These type
| segregation allows to present related permission options under relevant
| parent items. i.e.
|
*/
$permissions = [
    'Widget' => [
        ['permission' => 'viewWidgetAppTile', 'label' => 'View App tiles'],
    ],
    'API'    => [
        ['permission' => 'canMakeApiCallUsingXAuthToken', 'label' => 'API calls using Authentication token(X-Auth-Token)'],
    ],
];

return $permissions;
