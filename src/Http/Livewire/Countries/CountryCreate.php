<?php

namespace Storeways\Shipper\Http\Livewire\Countries;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Storeways\Shipper\Models\Country;
use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\FormBuilder;

class CountryCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    protected $pagePretitle = 'Shipper';

    protected $pageTitle = 'Create new country';

    public function generateFields($form)
    {
        $form->addField('text', [
            'label' => 'Country code',
            'model' => 'country_code',
            'rules' => 'required',
            'order' => 10,
            'hint' => 'Entry alpha 2 code for the country',
        ]);

        $form->addField('text', [
            'label' => 'Name',
            'model' => 'name',
            'rules' => 'required',
            'order' => 20,
        ]);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        Country::create($validatedData);

        return $this->alert('success', 'Saved!');
    }
}
