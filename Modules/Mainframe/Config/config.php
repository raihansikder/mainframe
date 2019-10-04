<?php

return [
    'name' => 'Mainframe',
    'route_prefix' => 'mainframe',

    'modules' => [
        'tenants' => [
            'id' => 1,
            'uuid' => 'eee7b4a8-abab-4b79-a751-b681624eb586',
            'name' => 'tenants',
            'title' => 'Tenants',
            'model' => 'Modules\Mainframe\Entities\Tenant',
            'controller' => 'Modules\Mainframe\Controllers\TenantsController',
            'url' => 'tenants',
            'description' => 'Manage tenants',
            'color_css' => 'aqua',
            'icon_css' => 'fa fa-puzzle-piece',
            'is_active' => 1,
            'meta' => [
                'is_dictionary' => 0,
            ],
        ],
        'users' => [
            'id' => 2,
            'uuid' => 'fbf8e074-03cf-4fff-aee0-2e635615f64d',
            'name' => 'users',
            'title' => 'Users',
            'model' => 'Modules\Mainframe\Entities\User',
            'controller' => 'Modules\Mainframe\Controllers\UsersController',
            'url' => 'users',
            'description' => 'Manage users',
            'color_css' => 'aqua',
            'icon_css' => 'fa fa-puzzle-piece',
            'is_active' => 1,
            'meta' => [
                'is_dictionary' => 0,
            ],
        ],
        'roles' => [
            'id' => 3,
            'uuid' => 'fd3c500d-ba51-48f2-80ca-f9dcc640831e',
            'name' => 'roles',
            'title' => 'Roles',
            'model' => 'Modules\Mainframe\Entities\Role',
            'controller' => 'Modules\Mainframe\Controllers\RolesController',
            'url' => 'roles',
            'description' => 'Manage roles',
            'color_css' => 'aqua',
            'icon_css' => 'fa fa-puzzle-piece',
            'is_active' => 1,
            'meta' => [
                'is_dictionary' => 0,
            ],
        ],

    ]
];
