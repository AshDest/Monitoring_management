<?php

namespace App\Http\Livewire\ControleStructure;

use App\Models\Commune_Secteur_Chefferie;
use App\Models\Province;
use App\Models\Quartier_Village;
use App\Models\Structure;
use App\Models\Ville_Territoire;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditStructure extends Component
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

    protected $rules = [
        'codeStructure' => 'required',
        'designation' => 'required',
        'selectedQuartier' => 'required',
        'avenu' => 'required',
        'numParcelle' => 'required',
        'long' => 'required',
        'lat' => 'required',
        'numTel1' => 'required',
        'numTel2' => 'required',
        'email' => 'required',
        'siteWeb' => 'required',
        'rccm' => 'required',
        'idNational' => 'required',
        'numImpot' => 'required',
        'numCNSS' => 'required',
    ];

    protected $messages = [
        'codeStructure' => 'ce Champ est obligatoire',
        'designation' => 'ce Champ est obligatoire',
        'selectedQuartier' => 'ce Champ est obligatoire',
        'avenu' => 'ce Champ est obligatoire',
        'numParcelle' => 'ce Champ est obligatoire',
        'long' => 'ce Champ est obligatoire',
        'lat' => 'ce Champ est obligatoire',
        'numTel1' => 'ce Champ est obligatoire',
        'numTel2' => 'ce Champ est obligatoire',
        'email' => 'ce Champ est obligatoire',
        'siteWeb' => 'ce Champ est obligatoire',
        'rccm' => 'ce Champ est obligatoire',
        'idNational' => 'ce Champ est obligatoire',
        'numImpot' => 'ce Champ est obligatoire',
        'numCNSS' => 'ce Champ est obligatoire',
    ];
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.controle-structure.edit-structure');
    }
}