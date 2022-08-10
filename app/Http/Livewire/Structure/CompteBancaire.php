<?php

namespace App\Http\Livewire\Structure;

use App\Models\Compte_Banque;
use Livewire\Component;

class CompteBancaire extends Component
{
    public $structure;
    public function render()
    {
        $comptebancaires = Compte_Banque::whereId($this->structure)->get();
        return view('livewire.structure.compte-bancaire', ['comptebancaires' => $comptebancaires]);
    }
}
