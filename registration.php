<?php

use StorePHP\StoreWays\Registrar;
use Storeways\Shipper\Http\Livewire\Account\AccountCreate;
use Storeways\Shipper\Http\Livewire\Account\AccountsIndex;
use Storeways\Shipper\Http\Livewire\Account\AccountUpdate;
use Storeways\Shipper\Http\Livewire\Cities\CitiesIndex;
use Storeways\Shipper\Http\Livewire\Cities\CityCreate;
use Storeways\Shipper\Http\Livewire\Cities\CityUpdate;
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
                route:'sw.shipper.city.index',
                order:20,
            ),
            $links->addLink(
                icon:'api-app',
                name:'Accounts',
                route:'sw.shipper.accounts.index',
                order:20,
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

        'storeways-shipper-city-index' => CitiesIndex::class,
        'storeways-shipper-city-create' => CityCreate::class,
        'storeways-shipper-city-update' => CityUpdate::class,

        'storeways-shipper-account-index' => AccountsIndex::class,
        'storeways-shipper-account-create' => AccountCreate::class,
        'storeways-shipper-account-update' => AccountUpdate::class,
    ]
);
