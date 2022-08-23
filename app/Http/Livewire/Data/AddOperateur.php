<?php

namespace App\Http\Livewire\Data;

use App\Models\Operateur_tel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddOperateur extends Component
{
    use LivewireAlert;

    public $code;
    public $nomOperateur;

    protected $rules = [
        'code' => 'required|max:8',
        'nomOperateur' => 'required',
    ];

    public function resetAllFiels()
    {
        $this->code = '';
        $this->nomOperateur = '';
    }

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            Operateur_tel::create([
                'code' => $this->code,
                'nomOperateur' => $this->nomOperateur,
            ])->save();
            $this->resetAllFiels();
            $this->alert('success', 'Enregistrement Effectuer!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,]);
                // return redirect()->to('/quartiers');
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.data.add-operateur');
    }
}
