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
    public $ids;
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
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function edit()
    {
        try {
            $this->validate();
            Structure::find($this->ids)->fill([
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
            $this->alert('success', 'Structure bien Modifier', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            return redirect()->to('/structures');
        } catch (\Exception $e) {
            $this->alert('warning', 'Echec de modification!' . $e->getMessage());
        }
    }
    public function mount()
    {
        $vars = Structure::find($this->ids);
        $this->codeStructure = $vars->codeStructure;
        $this->designation = $vars->designation;
        $this->adresse_id = $vars->adresse_id;
        $this->avenu = $vars->avenu;
        $this->numParcelle = $vars->numParcelle;
        $this->long = $vars->long;
        $this->lat = $vars->lat;
        $this->numTel1 = $vars->numTel1;
        $this->numTel2 = $vars->numTel2;
        $this->email = $vars->email;
        $this->siteWeb = $vars->siteWeb;
        $this->rccm = $vars->rccm;
        $this->idNational = $vars->idNational;
        $this->numImpot = $vars->numImpot;
        $this->numCNSS = $vars->numCNSS;
        $this->selectedQuartier = $vars->adresse_id;

        $this->provinces = Province::all();
        $this->territoires = collect();
        $this->communes = collect();
        $this->quartiers = collect();
    }
    public function render()
    {
        return view('livewire.controle-structure.edit-structure');
    }
}