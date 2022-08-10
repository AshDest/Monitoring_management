<?php

namespace App\Http\Livewire\Structure;

use App\Models\Operateur_tel;
use Livewire\Component;

class AddMonnaieElectronique extends Component
{
    public function render()
    {
        $operateurs = Operateur_tel::all();
        return view('livewire.structure.add-monnaie-electronique', ['operateurs' => $operateurs]);
    }
}
