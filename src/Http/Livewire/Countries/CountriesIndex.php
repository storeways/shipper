<?php

namespace Storeways\Shipper\Http\Livewire\Countries;

use Livewire\Component;
use Storeways\Shipper\Models\Country;
use Store\Dashboard\Views\Layouts\DashboardLayout;

class CountriesIndex extends Component
{
    public $search = '';

    public function render()
    {
        $countries = Country::with('cities')->where(function ($q) {
            if ($this->search) {
                $q->where('country_code', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%');
            }
        })->paginate(15);

        return view('storephp-shipper::countries.index', [
            'countries' => $countries,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Country $country)
    {
        return ($country->delete()) ? 'delete' : 'error';
    }
}
