<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Province;
use App\Models\Ville_Territoire;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddVilles extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;
    public $province_id;

    protected $rules = [
        'code' => 'required|max:8',
        'designation' => 'required',
        'province_id' => 'required',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        try {
            Ville_Territoire::create([
                'code' => $this->code,
                'designation' => $this->designation,
                'province_id' => $this->province_id,
            ])->save();
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
        $provinces = Province::all();
        return view('livewire.localisation.add-villes', ['provinces' => $provinces]);
    }
}
