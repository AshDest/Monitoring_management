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


    public function save()
    {
        try {
            Structure::create([
                'codeStructure' => $this->codeStructure,
                'designation' => $this->designation,
                'adresse_id' => $this->selectedQuartier,
                'avenu' => $this->avenu,
                'numParcelle' => $this->numParcelle,
                'long' => $this->long,
                'lat' => $this->lat,
                'numTel1' => $this->numTel1,
                'numTel2' => $this->numTel2,
                'email' => $this->email,
                'siteWeb' => $this->siteWeb,
                'rccm' => $this->rccm,
                'idNational' => $this->idNational,
                'numImpot' => $this->numImpot,
                'numCNSS' => $this->numCNSS,
            ])->save();
            $this->emit('StudentUpdated');
            $this->dispatchBrowserEvent('alert', [
                'type' => 'success',
                'message' => "Classe enregistée avec succes!!"
            ]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
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
