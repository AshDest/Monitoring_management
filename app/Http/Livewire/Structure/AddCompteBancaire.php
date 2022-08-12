<?php

namespace App\Http\Livewire\Structure;

use App\Models\Banque;
use App\Models\Compte_Banque;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddCompteBancaire extends Component
{
    public $numeroCompte;
    public $codeBanque;
    public $designation;
    public $agence;
    public $solde;
    public $codeStructure;
    public $GLCompteBanque;

    public $structure;
    use LivewireAlert;

    protected $rules = [
        'numeroCompte' => 'required',
        'codeBanque' => 'required',
        'designation' => 'required',
        'codeStructure' => 'required'
    ];
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        try {
            Compte_Banque::create([
                'numeroCompte' => $this->numeroCompte,
                'codeBanque' => $this->codeBanque,
                'designation' => $this->designation,
                'agence' => $this->agence,
                'solde' => $this->solde,
                'codeStructure' => $this->structure,
                'GLCompteBanque' => $this->GLCompteBanque,
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
        $banques = Banque::all();
        return view('livewire.structure.add-compte-bancaire', ['banques' => $banques]);
    }
}
