<?php

namespace App\Http\Livewire;

use App\Models\Commune_Secteur_Chefferie;
use App\Models\Province;
use App\Models\Quartier_Village;
use App\Models\Structure;
use App\Models\Ville_Territoire;
use Livewire\Component;

class CreateStructure extends Component
{
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
    public $selectedCommune=null;
    public $selectedQuartier=null;


    protected $rules = [
        'codeStructure' => 'required|min:8',
        'designation' => 'required|email',
        'selectedQuartier' => 'required|min:3',
        'avenu' => 'required|min:3',
        'numParcelle' => 'required',
        'long' => 'required|min:8',
        'lat' => 'required|email',
        'numTel1' => 'required|min:3',
        'numTel2' => 'required|min:3',
        'email' => 'required',
        'siteWeb' => 'required|min:8',
        'rccm' => 'required|email',
        'idNational' => 'required|min:3',
        'numImpot' => 'required|min:3',
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


    public function save()
    {
        dd($this->designation);
    }

    public function updatedSelectedProvince($province)
    {
        try {
            if (!is_null($province)) {
                $this->territoires = Ville_Territoire::where('province_id', $province)->get();
                // $this->communes = null;
                // $this->quartiers = null;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function updatedSelectedCity($territoires)
    {
        if (!is_null($territoires)) {
            $this->communes = Commune_Secteur_Chefferie::where('ville_id', $territoires)->get();
        }
    }

    public function updatedSelectedCommune($commune)
    {
        if (!is_null($commune)) {
            $this->quartiers = Quartier_Village::where('commune_id', $commune)->get();
        }
    }
    public function mount()
    {
        $this->provinces = Province::all();
        $this->territoires = collect();
        $this->communes = collect();
        $this->quartiers = collect();
    }

    public function render()
    {
        return view('livewire.create-structure');
    }
}
