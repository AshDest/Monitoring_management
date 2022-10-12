<?php

namespace App\Http\Livewire;

use App\Models\Province;
use App\Models\Structure;
use App\Models\Ville_Territoire;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Structures extends Component
{

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

    protected $listeners = [
        'confirmed'
    ];

    public function confirmed()
    {
        Structure::whereId($this->ids)->delete();
        $this->alert('success', 'Suppression avec Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
        ]);
    }

    public function cancelled()
    {
        // Do something when cancel button is clicked
    }

    public function delete($id)
    {
        //
        $this->ids = $id;
        $this->confirm('Voulez vous supprimer?', [
            'onConfirmed' => 'confirmed',
        ]);
    }

    public function render()
    {
        $structures = Structure::all();
        return view('livewire.structures', ['structures' => $structures]);
    }
}