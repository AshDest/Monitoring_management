<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Province;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Provinces extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;

    public $form_edit;

    public $ids;

    public function update()
    {
        try {
            Province::whereId($this->form_edit)
                ->update([
                    'code' => $this->code,
                    'designation' => $this->designation,
                ]);
            $this->form_edit =  NULL;
            $this->alert('success', 'Modifier avec Success', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        } catch (\Throwable $th) {
            $this->form_edit =  NULL;
            $this->alert('success', $th->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }
    public function displayformedit($id){
        $this->form_edit = $id;
        $op = Province::find($id);

        $this->code = $op->code;
        $this->designation = $op->designation;
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed(){
        Province::whereId($this->ids)->delete();
        $this->alert('success', 'Suppression avec Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,]);
    }

    public function cancelled()
    {
        // Do something when cancel button is clicked
    }

    public function delete($id){
        //
        $this->ids = $id;
        $this->confirm('Voulez vous supprimer?', [
            'onConfirmed' => 'confirmed',
        ]);
    }
    public function render()
    {
        $provinces = Province::all();
        return view('livewire.localisation.provinces', ['provinces' => $provinces]);
    }
}
