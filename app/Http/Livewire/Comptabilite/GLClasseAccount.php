<?php

namespace App\Http\Livewire\Comptabilite;

use App\Models\GLAccountClasse;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class GLClasseAccount extends Component
{
    use LivewireAlert;
    public $designation;
    public $detail;
    public $ids;
    protected $rules = [
        'designation' => 'required|max:10',
    ];
    public function resetAllFiels()
    {
        $this->designation = '';
        $this->detail = '';
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        try {
            if (!$this->ids) {
                GLAccountClasse::create([
                    'designation' => $this->designation,
                    'detail' => $this->detail,
                ])->save();
                $this->alert('success', 'Saved Successfully', [
                    'position' => 'center',
                    'timer' => 3000,
                    'toast' => true,
                ]);
                $this->resetAllFiels();
            } else {
                GLAccountClasse::whereId($this->ids)
                    ->update([
                        'designation' => $this->designation,
                        'detail' => $this->detail,
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
        $vars = GLAccountClasse::find($id);
        $this->ids = $vars->id;
        $this->designation = $vars->designation;
        $this->detail = $vars->detail;
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed()
    {
        GLAccountClasse::whereId($this->ids)->delete();
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
        $this->ids = $id;
        $this->confirm('Voulez vous supprimer?', [
            'onConfirmed' => 'confirmed',
        ]);
    }
    public function render()
    {
        $classes = GLAccountClasse::all();
        return view('livewire.comptabilite.g-l-classe-account', ['classes' => $classes]);
    }
}