<?php

use Illuminate\Support\Facades\Route;
use Storeways\Shipper\Http\Livewire\Countries\CountriesIndex;
use Storeways\Shipper\Http\Livewire\Countries\CountryCreate;
use Storeways\Shipper\Http\Livewire\Countries\CountryUpdate;

Route::prefix('countries')->group(function () {
    Route::get('/', CountriesIndex::class)->name('sw.shipper.country.index');
    Route::get('/create', CountryCreate::class)->name('sw.shipper.country.create');
    Route::get('/{country}', CountryUpdate::class)->name('sw.shipper.country.update');
});
