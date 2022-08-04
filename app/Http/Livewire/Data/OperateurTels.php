<?php

namespace App\Http\Livewire\Data;

use App\Models\Operateur_tel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class OperateurTels extends Component
{
    use LivewireAlert;

    public $code;
    public $nomOperateur;

    public $form_edit;

    public $ids;

    public function update()
    {
        try {
            Operateur_tel::whereId($this->form_edit)
                ->update([
                    'code' => $this->code,
                    'nomOperateur' => $this->nomOperateur,
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
        $op = Operateur_tel::find($id);

        $this->code = $op->code;
        $this->nomOperateur = $op->nomOperateur;
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed(){
        Operateur_tel::whereId($this->ids)->delete();
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
        $operateurs = Operateur_tel::all();
        return view('livewire.data.operateur-tels', ['operateurs' => $operateurs]);
    }
}
