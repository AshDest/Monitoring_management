<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Commune_Secteur_Chefferie;
use App\Models\Ville_Territoire;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddCommunes extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;
    public $ville_id;

    protected $rules = [
        'code' => 'required|max:8',
        'designation' => 'required',
        'ville_id' => 'required',
    ];

    public function resetAllFiels()
    {
        $this->code = '';
        $this->designation = '';
        $this->ville_id = null;
    }

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        try {
            Commune_Secteur_Chefferie::create([
                'code' => $this->code,
                'designation' => $this->designation,
                'ville_id' => $this->ville_id,
            ])->save();
            $this->resetAllFiels();
            $this->alert('success', 'Saved Successfully', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            // $refresh;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }
    public function render()
    {
        $villes = Ville_Territoire::all();
        return view('livewire.localisation.add-communes', ['villes' => $villes]);
    }
}
