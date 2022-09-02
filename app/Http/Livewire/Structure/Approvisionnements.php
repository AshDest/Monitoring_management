<?php

namespace App\Http\Livewire\Structure;

use App\Models\Approvisionnement;
use Livewire\Component;

class Approvisionnements extends Component
{
    public $structure;

    public function render()
    {
        $approvisionnement = Approvisionnement::where('structure_id',$this->structure)->get();
        return view('livewire.structure.approvisionnements', ['approvisionnement' => $approvisionnement]);
    }
}
