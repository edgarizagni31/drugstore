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
            'route' => 'products.index',
            'type' => 'item',
            'roles' => 'ADMIN|INVENTARIO|ALMACENERO'
        ],
        [
            'label' => 'Productos',
            'route' => 'sales.index',
            'type' => 'principal',
            'roles' => '*'
        ],
        [
            'label' => 'Categorias',
            'route' => 'categories.index',
            'type' => 'item',
            'roles' => 'ADMIN|INVENTARIO|ALMACENERO'
        ],
        [
            'label' => 'Provedores',
            'route' => 'suppliers.index',
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
            'route' => 'reports.index',
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
            'route' => 'roles.index',
            'type' => 'item',
            'roles' => 'ADMIN'
        ],
    ]
];