<?php

namespace App\Http\Livewire\Structure;

use App\Models\Utilisateur as ModelsUtilisateur;
use Livewire\Component;

class Utilisateur extends Component
{
    public $agent_id;
    public $username;
    public $password;
    public $role;

    public $structure;

    public function render()
    {
        $utilisateurs = ModelsUtilisateur::where('id_structure', $this->structure)->get();
        return view('livewire.structure.utilisateur');
    }
}
