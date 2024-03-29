<?php

namespace App\Http\Livewire\Comptabilite;

use App\Models\GLAccount;
use Livewire\Component;

class GLAccounts extends Component
{
    public $code;
    public $description;
    public $balance;
    public $isAccount_system;
    public $account_type_id;
    public $account_level_id;
    public $currency_id;
    public $account_id;
    public $account_classe;

    public function render()
    {
        $accounts = GLAccount::where('structure_id', null)->orderBy('code', 'ASC')->get();
        return view('livewire.comptabilite.g-l-accounts', ['accounts' => $accounts]);
    }
}