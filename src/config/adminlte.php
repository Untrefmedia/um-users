<?php

return [
    'menu' => [
        [
            'text'        => 'Users',
            'url'         => 'admin/users',
            'icon'        => 'file',
            'label'       => null,
            'label_color' => 'success',
            'submenu'     => [
                [
                    'text' => 'List',
                    'url'  => 'admin/users'
                ],
                [
                    'text' => 'Create',
                    'url'  => 'admin/users/create'
                ]
            ]
        ]
    ]
];
