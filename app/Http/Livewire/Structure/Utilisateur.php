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
                            ->whereNotNull('codeStructure')
                            ->where('codeStructure', $this->structure)->get();
        return view('livewire.structure.utilisateur', ['utilisateurs' => $utilisateurs]);
    }
}
