<?php

namespace App\Http\Livewire\Structure;

use App\Models\Agent;
use Livewire\Component;

class Agents extends Component
{
    public $structure;
    public function render()
    {
        $agents = Agent::whereId($this->structure)->get();
        return view('livewire.structure.agents', ['agents' => $agents]);
    }
}
