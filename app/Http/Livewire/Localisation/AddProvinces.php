<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Province;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class AddProvinces extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;


    protected $rules = [
        'code' => 'required|max:8',
        'designation' => 'required',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        try {
            Province::create([
                'code' => $this->code,
                'designation' => $this->designation,
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
        return view('livewire.localisation.add-provinces');
    }
}
