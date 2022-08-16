<?php

namespace App\Http\Livewire\Structure;

use Livewire\Component;

class Ventes extends Component
{
    public $structure;
    public function render()
    {
        $ventes = Ventes::where('id_structure',$this->structure)->get();
        return view('livewire.structure.ventes', ['ventes' => $ventes]);
    }
}
