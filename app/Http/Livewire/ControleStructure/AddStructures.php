<?php

namespace App\Http\Livewire\ControleStructure;

use App\Models\Commune_Secteur_Chefferie;
use App\Models\Province;
use App\Models\Quartier_Village;
use App\Models\Structure;
use App\Models\Ville_Territoire;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class AddStructures extends Component
{
    use LivewireAlert;
    public $codeStructure;
    public $designation;
    public $adresse_id;
    public $avenu;
    public $numParcelle;
    public $long;
    public $lat;
    public $numTel1;
    public $numTel2;
    public $email;
    public $siteWeb;
    public $rccm;
    public $idNational;
    public $numImpot;
    public $numCNSS;

    public $toto;

    public $provinces;
    public $territoires;
    public $communes;
    public $quartiers;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedCommune = null;
    public $selectedQuartier = null;

    public function mount()
    {
        $this->provinces = Province::all();
        $this->territoires = collect();
        $this->communes = collect();
        $this->quartiers = collect();
    }
    public function render()
    {
        return view('livewire.controle-structure.add-structures');
    }
}