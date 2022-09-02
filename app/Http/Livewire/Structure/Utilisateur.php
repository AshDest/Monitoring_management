<?php

namespace App\Http\Livewire\Structure;

use App\Models\Agent;
use App\Models\User;
// use App\Models\Utilisateur as ModelsUtilisateur;
use Livewire\Component;

class Utilisateur extends Component
{
    public $agent_id;
    public $username;
    public $password;
    public $role;

    public $structure_id;


    public $structure;

    public function render()
    {

        $users = User::whereNotNull('structure_id')
                            ->where('structure_id', $this->structure)->get();
        return view('livewire.structure.utilisateur', ['users' => $users]);
    }
}
