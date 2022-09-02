<?php

namespace App\Http\Livewire\Structure;

use App\Models\Vente;
use Livewire\Component;

class Ventes extends Component
{
    public $structure;
    public function render()
    {
        $ventes = Vente::where('structure_id', $this->structure)->get();
        return view('livewire.structure.ventes', ['ventes' => $ventes]);
    }
}
