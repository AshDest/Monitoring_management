<?php

namespace App\Http\Livewire\Structure;

use App\Models\Monnaie_Electronique;
use Livewire\Component;

class MonnaiElectronique extends Component
{
    public $structure;
    public function render()
    {
        $monnaielectronique = Monnaie_Electronique::whereId($this->structure)->get();
        return view('livewire.structure.monnai-electronique', ['monnaielectronique' => $monnaielectronique]);
    }
}
