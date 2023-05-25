<?php

namespace Storeways\Shipper\Http\Livewire\Cities;

use Livewire\Component;
use Storeways\Shipper\Models\City;
use Store\Dashboard\Views\Layouts\DashboardLayout;

class CitiesIndex extends Component
{
    public $search = '';

    public function render()
    {
        $cities = City::with('country')->where(function ($q) {
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
