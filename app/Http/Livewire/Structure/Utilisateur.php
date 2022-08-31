<?php

namespace App\Http\Livewire\Structure;

use App\Models\User;
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
        $utilisateurs = User::select('*')
                            ->whereNotNull('structure_id')
                            ->where('structure_id', $this->structure)->get();
        return view('livewire.structure.utilisateur', ['utilisateurs' => $utilisateurs]);
    }
}
