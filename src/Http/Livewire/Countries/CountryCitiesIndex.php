<?php

namespace Storeways\Shipper\Http\Livewire\Countries;

use Livewire\Component;
use Storeways\Shipper\Models\City;
use Storeways\Shipper\Models\Country;
use Store\Dashboard\Views\Layouts\DashboardLayout;

class CountryCitiesIndex extends Component
{
    public $search = '';

    public $country;

    public function mount(Country $country)
    {
        $this->country = $country;
    }

    public function render()
    {
        $cities = City::where('country_id', $this->country->id)->where(function ($q) {
            if ($this->search) {
                $q->where('name', 'like', '%' . $this->search . '%');
            }
        })->paginate(15);

        return view('storephp-shipper::cities.index', [
            'cities' => $cities,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(City $city)
    {
        return ($city->delete()) ? 'delete' : 'error';
    }
}
