<?php

namespace Storeways\Shipper\Http\Livewire\Countries;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\FormBuilder;
use Store\Modules\Catalog\Support\Facades\CategoryFormTabs;
use Storeways\Shipper\Models\Country;

class CountryCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    public $pagePretitle = 'Shipper';

    public $pageTitle = 'Create new country';

    public $slug;

    public function generateTabs($tabs)
    {
        $tabs->addTab([
            'id' => 'basic',
            'name' => 'Basic info',
        ]);

        $tabs->mergeTabs(CategoryFormTabs::getTabs());
    }

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
