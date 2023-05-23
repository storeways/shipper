<?php

use StorePHP\StoreWays\PluginRegistrar;
use Storeways\Shipper\Http\Livewire\Countries\CountryCreate;

// initModule
PluginRegistrar::initModule('storeways_shipper', [
    'icon' => 'cube-send',
    'name' => 'Shipper',
    'slug' => 'shipper',
    'order' => 500,
], function ($links) {
    return [
        $links->addLink(
            icon:'world',
            name:'Countries',
            route:'#',
            order:10,
        ),
        $links->addLink(
            icon:'map-2',
            name:'Cities',
            route:'#',
            order:20,
        ),
        $links->addLink(
            icon:'cash',
            name:'Costs',
            route:'#',
            order:30,
        ),
    ];
});

// loadMigrations
PluginRegistrar::loadMigrations(__DIR__ . '/database/migrations');

// loadRoutes
\StorePHP\StoreWays\PluginRegistrar::loadRoutes(__DIR__ . '/routes/web.php', 'shipper');

// loadLivewireComponent
\StorePHP\StoreWays\PluginRegistrar::loadLivewireComponent('storeways-shipper-country-create', CountryCreate::class);
