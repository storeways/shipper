<?php

namespace Storeways\Shipper\Http\Livewire\Account;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Storeways\Shipper\Adapter;
use Storeways\Shipper\Models\Account;
use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\Contracts\hasGenerateTabs;
use Store\Dashboard\Builder\FormBuilder;

class AccountUpdate extends FormBuilder implements hasGenerateTabs, hasGenerateFields
{
    use LivewireAlert;

    protected $pagePretitle = 'Shipper';

    protected $pageTitle = 'Update this account';

    public $account;

    public $method_code;
    public $account_name;

    public $properties;

    public function mount(Account $account)
    {
        $this->account = $account;
        $this->method_code = $account->method_code;
        $this->account_name = $account->account_name;

        array_map(function ($property) {
            $this->properties[$property['property_key']] = $property['property_value'];
        }, $account->properties()->get()->toArray());
    }

    public function generateTabs($tabs)
    {
        $tabs->addTab([
            'id' => 'basic',
            'name' => 'Basic info',
        ]);

        $tabs->addTab([
            'id' => 'properties',
            'name' => 'Properties',
        ]);
    }

    public function generateFields($form)
    {
        $form->addField('select', [
            'label' => 'Method',
            'model' => 'method_code',
            'options' => array_map(function ($method) {
                return [
                    'label' => $method['name'],
                    'value' => $method['id'],
                ];
            }, Adapter::getMethods()),
            'rules' => 'required',
            'order' => 10,
            'hint' => 'You can not select.',
        ]);

        $form->addField('text', [
            'label' => 'Name',
            'model' => 'account_name',
            'rules' => 'required',
            'order' => 20,
        ]);
    }

    public function appendFields($form)
    {
        foreach (Adapter::getMethod($this->method_code)['properties'] as $property) {
            $form->addField('text', [
                'tab' => 'properties',
                'label' => $property,
                'model' => 'properties.' . $property,
                'rules' => 'required',
                'order' => 30,
            ]);
        }
    }

    public function submit()
    {
        $validatedData = $this->validate();

        $this->account->update([
            'account_name' => $validatedData['account_name'],
        ]);

        foreach ($validatedData['properties'] as $key => $value) {
            if ($property = $this->account->properties()->where('property_key', $key)->first()) {
                $property->property_value = $value;
                $property->save();
            } else {
                $this->account->properties()->create([
                    'property_key' => $key,
                    'property_value' => $value,
                ]);
            }
        }

        return $this->alert('success', 'Updated!');
    }
}
