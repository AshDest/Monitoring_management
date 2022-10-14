<?php

namespace App\Http\Livewire\Structure;

use App\Models\Monnaie_Electronique;
use App\Models\Operateur_tel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditMonnais extends Component
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
    public $ids;

    protected $rules = [
        'codeOperateur' => 'required',
        'numTel' => 'required',
        'GLMonnaieE' => 'required',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function mount()
    {
        $vars = Monnaie_Electronique::find($this->ids);
        dd($vars);
        $this->codeOperateur = $vars->codeOperateur;
        $this->numTel = $vars->numTel;
        $this->soldeUSD = $vars->soldeUSD;
        $this->soldeCDF = $vars->soldeCDF;
    }
    public function render()
    {
        $operateurs = Operateur_tel::all();
        return view('livewire.structure.edit-monnais', ['operateurs' => $operateurs]);
    }
}