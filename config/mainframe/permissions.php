<?php
/*
|--------------------------------------------------------------------------
| Additional-permissions types field
|--------------------------------------------------------------------------
|
| Additional permissions can be categories into different types. These type
| segregation allows to present related permission options under relevant
| parent items. i.e.
|
*/
return [
    'Widget' => [
        ['permission' => 'view-widget', 'label' => 'View App tiles'],
    ],
    'API' => [
        ['permission' => 'api', 'label' => 'API calls using Authentication token(X-Auth-Token)'],
    ],
];
