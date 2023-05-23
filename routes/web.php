<?php

use Illuminate\Support\Facades\Route;
use Storeways\Shipper\Http\Livewire\Countries\CountryCreate;

Route::get('/create', CountryCreate::class)->name('sw.shipper.country.create');
