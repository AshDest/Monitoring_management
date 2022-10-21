<?php

namespace App\Http\Livewire\Comptabilite;

use App\Models\AccountLevel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AccountLevels extends Component
{
    use LivewireAlert;
    public $level;
    public $ids;

    protected $rules = [
        'level' => 'required|max:8',
    ];
    public function resetAllFiels()
    {
        $this->level = '';
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        try {
            AccountLevel::create([
                'level' => $this->level,
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
        $levels = AccountLevel::all();
        return view('livewire.comptabilite.account-levels', ['levels' => $levels]);
    }
}