<?php

use StorePHP\StoreWays\Registrar;
use Storeways\Shipper\Http\Livewire\Countries\CountryCreate;

Registrar::module(
    id:'storewys_shipper',
    info:[
        'name' => 'Shipper',
    ],
    sidebar:[
        'icon' => 'cube-send',
        'name' => 'Shipper',
    ],
    menu:function ($links) {
        return [
            $links->addLink(
                icon:'world',
                name:'Countries',
                route:'dashboard',
                order:10,
            ),
            $links->addLink(
                icon:'map-2',
                name:'Cities',
                route:'dashboard',
                order:20,
            ),
            $links->addLink(
                icon:'cash',
                name:'Costs',
                route:'dashboard',
                order:30,
            ),
        ];
    },
    migrations:__DIR__ . '/database/migrations',
    routes:['shipper', __DIR__ . '/routes/web.php'],
    // views:['shipper', __DIR__ . '/views'],
    livewireComponents:[
        'storeways-shipper-country-create' => CountryCreate::class,
    ]
);
