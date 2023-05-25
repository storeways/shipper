<?php

use StorePHP\StoreWays\Registrar;
use Storeways\Shipper\Http\Livewire\Countries\CountriesIndex;
use Storeways\Shipper\Http\Livewire\Countries\CountryCreate;
use Storeways\Shipper\Http\Livewire\Countries\CountryUpdate;

Registrar::module(
    id:'storewys_shipper',
    info:[
        'name' => 'Shipper',
    ],
    sidebar:[
        'icon' => 'cube-send',
        'name' => 'Shipper',
        'order' => 700,
    ],
    menu:function ($links) {
        return [
            $links->addLink(
                icon:'world',
                name:'Countries',
                route:'sw.shipper.country.index',
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
    views:['storephp-shipper', __DIR__ . '/resources/views'],
    livewireComponents:[
        'storeways-shipper-country-index' => CountriesIndex::class,
        'storeways-shipper-country-create' => CountryCreate::class,
        'storeways-shipper-country-update' => CountryUpdate::class,
    ]
);
