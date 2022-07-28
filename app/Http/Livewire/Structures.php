<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\Structure;
use App\Models\Ville_Territoire;
use Livewire\Component;

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
    public $selectedCommune=null;
    public $selectedQuartier=null;


    public function save()
    {
        $validatedData = $this->validate([
            'codeStructure'=>'required',
            'designation'=>'required',
            'adresse_id'=>'required',
            'avenu'=>'required',
            'numParcelle'=>'required',
            'long'=>'required',
            'lat'=>'required',
            'numTel1'=>'required',
            'numTel2'=>'required',
            'email'=>'required',
            'siteWeb'=>'required',
            'rccm'=>'required',
            'idNational'=>'required',
            'numImpot'=>'required',
            'numCNSS'=>'required'
        ]);
        try {
            Structure::create($validatedData);
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
        return view('livewire.structures', ['structures'=>$structures]);
    }
}
