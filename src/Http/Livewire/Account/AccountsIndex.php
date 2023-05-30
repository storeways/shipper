<?php

namespace Storeways\Shipper\Http\Livewire\Account;

use Livewire\Component;
use Store\Dashboard\Views\Layouts\DashboardLayout;
use Storeways\Shipper\Models\Account;

class AccountsIndex extends Component
{
    public $search = '';

    public function render()
    {
        $accounts = Account::where(function ($q) {
            if ($this->search) {
                $q->where('name', 'like', '%' . $this->search . '%');
            }
        })->paginate(15);

        return view('storephp-shipper::accounts.index', [
            'accounts' => $accounts,
        ])->layout(DashboardLayout::class);
    }

    public function deleteIt(Account $account)
    {
        return ($account->delete()) ? 'delete' : 'error';
    }
}
