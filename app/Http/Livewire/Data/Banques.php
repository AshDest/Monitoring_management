<?php

namespace App\Http\Livewire\Data;

use App\Models\Banque;
use Livewire\Component;

class Banques extends Component
{
    public function render()
    {
        $banques = Banque::all();
        return view('livewire.data.banques', ['banques' => $banques]);
    }
}
