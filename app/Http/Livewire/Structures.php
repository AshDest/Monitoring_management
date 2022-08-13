<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\Structure;
use App\Models\Ville_Territoire;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Structures extends Component
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
    public $selectedCommune = null;
    public $selectedQuartier = null;

    public $form_edit;
    use LivewireAlert;

    public function modifycmpt()
    {
        Structure::whereId($this->form_edit)
            ->update([
                'codeStructure' => $this->codeStructure,
                'designation' => $this->designation,
                'adresse_id' => $this->adresse_id,
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
            ]);
        $this->form_edit =  NULL;
        $this->alert('success', 'Modifier avec Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed(){
        Structure::whereId($this->ids)->delete();
        $this->alert('success', 'Suppression avec Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,]);
    }

    public function cancelled()
    {
        // Do something when cancel button is clicked
    }

    public function delete($id){
        //
        $this->ids = $id;
        $this->confirm('Voulez vous supprimer?', [
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function displayformedit($id){
        $this->form_edit = $id;
        $var = Structure::find($id);

        $this->codeStructure = $var->codeStructure;
        $this->designation = $var->designation;
        $this->adresse_id = $var->adresse_id;
        $this->avenu = $var->avenu;
        $this->numParcelle = $var->numParcelle;
        $this->long = $var->long;
        $this->lat = $var->lat;
        $this->numTel1 = $var->numTel1;

        $this->numTel2 = $var->numTel2;
        $this->siteWeb = $var->siteWeb;
        $this->rccm = $var->rccm;
        $this->idNational = $var->idNational;
        $this->numParcelle = $var->numParcelle;
        $this->numImpot = $var->numImpot;
        $this->numCNSS = $var->numCNSS;
    }
    public function mount()
    {
        $this->provinces = Province::all();
        $this->territoires = collect();
        $this->communes = collect();
        $this->quartiers = collect();
    }

    // public function updatedSelectedProvince($province)
    // {
    //     dd('ddd');
    //     if (!is_null($province)) {
    //         $this->territoires = Ville_Territoire::where('province_id', $province)->get();
    //     $this->selectedQuartier = NULL;
    //     $this->selectedCommune = NULL;
    //     }
    // }

    public function updatingSelectedProvince($province)
    {
        try {
            if (!is_null($province)) {
                $this->territoires = Ville_Territoire::where('province_id', $province)->get();
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function render()
    {
        $structures = Structure::all();
        return view('livewire.structures', ['structures' => $structures]);
    }
}
