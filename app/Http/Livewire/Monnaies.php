<?php

namespace App\Http\Livewire;

use App\Models\Monnai;
use Livewire\Component;

class Monnaies extends Component
{
    public function render()
    {
        $monnaies = Monnai::all();
        return view('livewire.monnaies', ['monnaies' => $monnaies]);
    }
}
