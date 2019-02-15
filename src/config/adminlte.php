<?php

return [
    'menu' => [
        [
            'text'        => 'Users',
            'url'         => 'admin/user',
            'icon'        => 'file',
            'label'       => null,
            'label_color' => 'success',
            'submenu'     => [
                [
                    'text' => 'List',
                    'url'  => 'admin/user'
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/user/create'
                ]
            ],
            'can'         => 'venue-create' //momentaneo hasta crear el permiso correspondiente
        ]
    ]
];
