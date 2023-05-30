<?php

namespace Storeways\Shipper\Http\Livewire\Account;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Storeways\Shipper\Adapter;
use Storeways\Shipper\Models\Account;
use Store\Dashboard\Builder\Contracts\hasGenerateFields;
use Store\Dashboard\Builder\FormBuilder;

class AccountCreate extends FormBuilder implements hasGenerateFields
{
    use LivewireAlert;

    protected $pagePretitle = 'Shipper';

    protected $pageTitle = 'Create new account';

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

    public function submit()
    {
        $validatedData = $this->validate();

        Account::create($validatedData);

        return $this->alert('success', 'Saved!');
    }
}
