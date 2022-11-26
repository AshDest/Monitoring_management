<?php

namespace App\Http\Livewire\Structure;

use Livewire\Component;
use App\Models\GLAccount;

class Accounts extends Component
{
    public $structure;
    public function render()
    {
        $accounts = GLAccount::where('structure_id', $this->structure)->orderBy('code', 'ASC')->get();
        return view('livewire.structure.accounts', ['accounts' => $accounts]);
    }
}