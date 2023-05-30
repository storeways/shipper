<?php

namespace Storeways\Shipper;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class ShipperServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        // dd(Adapter::getMethods());
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // getMethods
        array_map(function ($method) {
            // loadViewsFrom
            $this->loadViewsFrom($method['view'][1], $method['view'][0]);

            // Livewire
            Livewire::component('shipper-' . $method['id'], $method['component']);
        }, Adapter::getMethods());
    }
}
