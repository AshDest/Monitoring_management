<?php

namespace App\Http\Livewire\Data;

use App\Models\Banque;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class AddBanques extends Component
{
    public $codeBanque;
    public $nomBanque;
    public $contact;

    use LivewireAlert;

    protected $rules = [
        'codeBanque' => 'required|min:8',
        'nomBanque' => 'required',
        'contact' => 'required',
    ];

    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        try {
            Banque::create([
                'codeBanque' => $this->codeBanque,
                'nomBanque' => $this->nomBanque,
                'contact' => $this->contact,
            ])->save();
            $this->alert('success', 'Success is approaching!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,]);
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }
    public function render()
    {
        return view('livewire.data.add-banques');
    }
}
