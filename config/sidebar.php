<?php

return [
    'items' => [
        [
            'label' => 'Ventas',
            'route' => 'sales.index',
            'type' => 'item',
            'roles' => 'ADMIN|CAJERO'
        ],
        [
            'label' => 'Caja',
            'route' => 'cash.index',
            'type' => 'item',
            'roles' => 'ADMIN|CAJERO'
        ],
        [
            'label' => 'Inventario',
            'route' => 'stocktaking.index',
            'type' => 'item',
            'roles' => 'ADMIN|INVENTARIO|ALMACENERO'
        ],
        [
            'label' => 'Aplicación',
            'route' => 'sales.index',
            'type' => 'principal',
            'roles' => '*'
        ],
        [
            'label' => 'Reportes',
            'route' => 'report.index',
            'type' => 'item',
            'roles' => 'ADMIN|CAJERO'
        ],
        [
            'label' => 'Autenticación',
            'route' => 'sales.index',
            'type' => 'principal',
            'roles' => 'ADMIN'
        ],
        [
            'label' => 'Usuarios',
            'route' => 'users.index',
            'type' => 'item',
            'roles' => 'ADMIN'
        ],
        [
            'label' => 'Roles',
            'route' => 'users.index',
            'type' => 'item',
            'roles' => 'ADMIN'
        ],
    ]
];