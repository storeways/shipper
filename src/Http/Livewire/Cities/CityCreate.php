<?php

namespace Storeways\Shipper\Http\Livewire\Cities;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Storeways\Shipper\Models\City;
use Storeways\Shipper\Models\Country;
use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\FormBuilder;

class CityCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    protected $pagePretitle = 'Shipper';

    protected $pageTitle = 'Create new city';

    public function generateFields($form)
    {
        $form->addField('select', [
            'label' => 'Country',
            'model' => 'country_id',
            'options' => Country::get()->map(function ($country) {
                return [
                    'label' => $country->name,
                    'value' => $country->id,
                ];
            }),
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'order' => 20,
        ]);

        $form->addField('price', [
            'label' => 'Shipping charges',
            'model' => 'shipping_charges',
            'rules' => 'nullable',
            'order' => 30,
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        City::create($validatedData);

        return $this->alert('success', 'Saved!');
    }
}
