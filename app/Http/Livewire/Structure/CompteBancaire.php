<?php

namespace App\Http\Livewire\Structure;

use App\Models\Compte_Banque;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class CompteBancaire extends Component
{
    public $structure;
    public $form_edit;

    public $banque_id;

    public $ids;
    use LivewireAlert;
    public function modifycmpt(){
        Compte_Banque::whereId($this->form_edit)
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
        Compte_Banque::whereId($this->ids)->delete();
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
        $bnq = Compte_Banque::find($id);

        $this->codeBanque = $bnq->codeBanque;
        $this->nomBanque = $bnq->nomBanque;
        $this->contact = $bnq->contact;
    }
    public function render()
    {
        $comptebancaires = Compte_Banque::all();
        return view('livewire.structure.compte-bancaire', ['comptebancaires' => $comptebancaires]);
    }
}
