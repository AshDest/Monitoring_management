<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Commune_Secteur_Chefferie;
use App\Models\Quartier_Village;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddQuartiers extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;
    public $commune_id;

    protected $rules = [
        'code' => 'required|max:8',
        'designation' => 'required',
        'commune_id' => 'required',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        try {
            Quartier_Village::create([
                'code' => $this->code,
                'designation' => $this->designation,
                'commune_id' => $this->commune_id,
            ])->save();
            $this->alert('success', 'Saved Successfully', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            $refresh;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }
    public function render()
    {
        $communes = Commune_Secteur_Chefferie::all();
        return view('livewire.localisation.add-quartiers', ['communes' => $communes]);
    }
}
