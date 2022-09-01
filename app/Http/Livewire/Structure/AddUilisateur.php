<?php

namespace App\Http\Livewire\Structure;

use App\Models\Agent;
use App\Models\User;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;

class AddUilisateur extends Component
{
    use LivewireAlert;

    public $agent_id;
    public $email;
    public $numTelephone;
    public $password;
    public $role;

    public $structure;
    protected $rules = [
        'agent_id' => 'required',
        'numTelephone' => 'required',
        'password' => 'required',
        'role' => 'required',
    ];

    public function resetAllFiels()
    {
        $this->email = '';
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
            User::create([
                'agent_id' => $this->agent_id,
                'numTelephone' => $this->numTelephone,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => $this->role,
                'structure_id' => $this->structure

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
