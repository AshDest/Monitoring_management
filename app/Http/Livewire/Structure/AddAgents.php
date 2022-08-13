<?php

namespace App\Http\Livewire\Structure;

use App\Models\Agent;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddAgents extends Component
{
    use LivewireAlert;
    public $matricule;
    public $noms;
    public $sexe;
    public $etatcivil;
    public $adresse;
    public $codeStructure;
    public $structure;


    protected $rules = [
        'matricule' => 'required',
        'noms' => 'required',
        'sexe' => 'required',
        'etatcivil' => 'required',
        'adresse' => 'required',
    ];
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            Agent::create([
                'matricule' => $this->matricule,
                'noms' => $this->noms,
                'sexe' => $this->sexe,
                'etatcivil' => $this->etatcivil,
                'adresse' => $this->adresse,
                'codeStructure' => $this->structure,

            ])->save();
            $this->alert('success', 'Saved Successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
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
        return view('livewire.structure.add-agents');
    }
}
