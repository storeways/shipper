<?php

use Illuminate\Support\Facades\Route;
use Storeways\Shipper\Http\Livewire\Account\AccountCreate;
use Storeways\Shipper\Http\Livewire\Account\AccountsIndex;
use Storeways\Shipper\Http\Livewire\Account\AccountUpdate;
use Storeways\Shipper\Http\Livewire\Cities\CitiesIndex;
use Storeways\Shipper\Http\Livewire\Cities\CityCreate;
use Storeways\Shipper\Http\Livewire\Cities\CityUpdate;
use Storeways\Shipper\Http\Livewire\Countries\CountriesIndex;
use Storeways\Shipper\Http\Livewire\Countries\CountryCitiesIndex;
use Storeways\Shipper\Http\Livewire\Countries\CountryCreate;
use Storeways\Shipper\Http\Livewire\Countries\CountryUpdate;

Route::prefix('countries')->group(function () {
    Route::get('/', CountriesIndex::class)->name('sw.shipper.country.index');
    Route::get('/create', CountryCreate::class)->name('sw.shipper.country.create');
    Route::get('/{country}', CountryUpdate::class)->name('sw.shipper.country.update');
    Route::get('/{country}/cities', CountryCitiesIndex::class)->name('sw.shipper.country.cities');
});

Route::prefix('cities')->group(function () {
    Route::get('/', CitiesIndex::class)->name('sw.shipper.city.index');
    Route::get('/create', CityCreate::class)->name('sw.shipper.city.create');
    Route::get('/{city}', CityUpdate::class)->name('sw.shipper.city.update');
});

Route::prefix('accounts')->group(function () {
    Route::get('/', AccountsIndex::class)->name('sw.shipper.accounts.index');
    Route::get('/create', AccountCreate::class)->name('sw.shipper.accounts.create');
    Route::get('/{account}', AccountUpdate::class)->name('sw.shipper.accounts.update');
});
