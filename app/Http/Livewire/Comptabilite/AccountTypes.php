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

    public $ids;

    protected $rules = [
        'designation' => 'required',
        'description' => 'required',
        'bs_order' => 'required',
    ];
    public function resetAllFiels()
    {
        $this->designation = '';
        $this->description = '';
        $this->bs_order = '';
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
                AccountType::create([
                    'designation' => $this->designation,
                    'description' => $this->description,
                    'bs_order' => $this->bs_order,
                ])->save();
                $this->alert('success', 'Saved Successfully', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
                $this->resetAllFiels();
            } else {
                AccountType::whereId($this->ids)
                    ->update([
                        'designation' => $this->designation,
                        'description' => $this->description,
                        'bs_order' => $this->bs_order,
                    ]);
                $this->alert('success', 'Modifier avec Success', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
                $this->resetAllFiels();
            }
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }
    public function displayInfo($id)
    {
        $vars = AccountType::find($id);
        $this->ids = $vars->id;
        $this->designation = $vars->designation;
        $this->description = $vars->description;
        $this->bs_order = $vars->bs_order;
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed()
    {
        AccountType::whereId($this->ids)->delete();
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
        $accounttypes = AccountType::all();
        return view('livewire.comptabilite.account-types', ['accounttypes' => $accounttypes]);
    }
}