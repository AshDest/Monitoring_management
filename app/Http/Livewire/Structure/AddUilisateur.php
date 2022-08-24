<?php

namespace App\Http\Livewire\Structure;

use App\Models\Agent;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class AddUilisateur extends Component
{
    use LivewireAlert;

    public $agent_id;
    public $username;
    public $password;
    public $role;

    public $structure;
    protected $rules = [
        'agent_id' => 'required',
        'username' => 'required',
        'password' => 'required',
        'roles' => 'required',
    ];

    public function resetAllFiels()
    {
        $this->username = '';
        $this->password = '';
        $this->agent_id = null;
        $this->role = null;
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            Utilisateur::create([
                'agent_id' => $this->agent_id,
                'username' => $this->username,
                'password' => Hash::make($this->password),
                'roles' => $this->roles,
                'codeStructure' => $this->structure

            ])->save();
            $this->alert('success', 'Saved Successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            // $refresh;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }

    public function mount($structure)
    {
        $this->structure = $structure;
    }
    public function render()
    {
        $agents = Agent::where('codeStructure',$this->structure)->get();
        return view('livewire.structure.add-uilisateur', ['agents' => $agents]);
    }
}
