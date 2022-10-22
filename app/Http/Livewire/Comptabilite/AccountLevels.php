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
            if (!$this->ids) {
                AccountLevel::create([
                    'level' => $this->level,
                ])->save();
                $this->alert('success', 'Saved Successfully', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
                $this->resetAllFiels();
            } else {
                AccountLevel::whereId($this->ids)
                    ->update([
                        'level' => $this->level,
                    ]);
                $this->alert('success', 'Modifier avec Success', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
                $this->resetAllFiels();
            }
        } catch (\Throwable $th) {
            $this->alert('success', $th->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }
    public function displayInfo($id)
    {
        $vars = AccountLevel::find($id);
        $this->ids = $vars->id;
        $this->level = $vars->level;
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed()
    {
        AccountLevel::whereId($this->ids)->delete();
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
        $levels = AccountLevel::all();
        return view('livewire.comptabilite.account-levels', ['levels' => $levels]);
    }
}