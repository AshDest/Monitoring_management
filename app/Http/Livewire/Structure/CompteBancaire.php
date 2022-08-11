<?php

namespace App\Http\Livewire\Structure;

use App\Models\Compte_Banque;
use Livewire\Component;

class CompteBancaire extends Component
{
    public $structure;
    public $form_edit;

    public $banque_id;

    public $ids;
    public function render()
    {
        $comptebancaires = Compte_Banque::all();
        return view('livewire.structure.compte-bancaire', ['comptebancaires' => $comptebancaires]);
    }
}
