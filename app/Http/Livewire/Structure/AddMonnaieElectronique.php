<?php

namespace App\Http\Livewire\Structure;

use App\Models\Monnaie_Electronique;
use App\Models\Operateur_tel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddMonnaieElectronique extends Component
{
    use LivewireAlert;

    public $codeOperateur;
    public $numTel;
    public $soldeUSD;
    public $soldeCDF;
    public $structure_id;
    public $GLMonnaieE;

    public $defaultValue = 0;

    public $structure;

    protected $rules = [
        'codeOperateur' => 'required',
        'numTel' => 'required',
        'soldeUSD' => 'required',
        'soldeCDF' => 'required',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            Monnaie_Electronique::create([
                'codeOperateur' => $this->codeOperateur,
                'numTel' => $this->numTel,
                'soldeUSD' => $this->soldeUSD,
                'soldeCDF' => $this->soldeCDF,
                'structure_id' => $this->structure,
                'GLMonnaieE' => $this->GLMonnaieE,

            ])->save();
            $this->alert('success', 'Saved Successfully!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            // $this->$refresh();
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
        $operateurs = Operateur_tel::all();
        return view('livewire.structure.add-monnaie-electronique', ['operateurs' => $operateurs]);
    }
}