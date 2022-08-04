<?php

namespace App\Http\Livewire\Data;

use App\Models\Banque;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Banques extends Component
{
    use LivewireAlert;

    public $codeBanque;
    public $nomBanque;
    public $contact;

    public $form_edit;

    public $ids;

    public function modifycmpt(){
        Banque::whereId($this->form_edit)
                                ->update([
                        'codeBanque' => $this->codeBanque,
                        'nomBanque' => $this->nomBanque,
                        'contact' => $this->contact,
                    ]);
        $this->form_edit =  NULL;
        $this->alert('success', 'Modifier avec Success', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,]);
    }

    protected $listeners = [
        'confirmed'
    ];

    public function confirmed(){
        Banque::whereId($this->ids)->delete();
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

    public function displayformedit($id){
        $this->form_edit = $id;
        $bnq = Banque::find($id);

        $this->codeBanque = $bnq->codeBanque;
        $this->nomBanque = $bnq->nomBanque;
        $this->contact = $bnq->contact;
    }

    public function render()
    {
        $banques = Banque::all();
        return view('livewire.data.banques', ['banques' => $banques]);
    }
}
