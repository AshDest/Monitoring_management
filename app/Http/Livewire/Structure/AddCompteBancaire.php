<?php

namespace App\Http\Livewire\Structure;

use App\Models\Banque;
use Livewire\Component;

class AddCompteBancaire extends Component
{
    public function render()
    {
        $banques = Banque::all();
        return view('livewire.structure.add-compte-bancaire', ['banques' => $banques]);
    }
}
