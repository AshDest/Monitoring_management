<?php

namespace App\Http\Livewire\Structure;

use Livewire\Component;

class Utilisateur extends Component
{
    public $agent_id;
    public $username;
    public $password;
    public $role;

    public function render()
    {
        return view('livewire.structure.utilisateur');
    }
}
