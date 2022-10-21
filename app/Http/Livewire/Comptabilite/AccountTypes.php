<?php

namespace App\Http\Livewire\Comptabilite;

use App\Models\AccountType;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AccountTypes extends Component
{
    use LivewireAlert;
    public $designation;
    public $description;
    public $bs_order;

    protected $rules = [
        'designation' => 'required',
        'description' => 'required',
        'bs_order' => 'required',
    ];
    public function resetAllFiels()
    {
        $this->designation;
        $this->description;
        $this->bs_order;
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        try {
            AccountType::create([
                'designation' => $this->designation,
                'description' => $this->description,
                'bs_order' => $this->bs_order,
            ])->save();
            $this->resetAllFiels();

            $this->alert('success', 'Saved Successfully', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            $this->resetAllFiels();
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }
    public function render()
    {
        return view('livewire.comptabilite.account-types');
    }
}