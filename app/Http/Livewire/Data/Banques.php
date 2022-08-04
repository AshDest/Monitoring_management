<?php

namespace App\Http\Livewire\Data;

use App\Models\Banque;
use Livewire\Component;

class Banques extends Component
{
    public $codeBanque;
    public $nomBanque;
    public $contact;

    public $form_edit;


    public function modifycmpt(){
        Banque::whereId($this->form_edit)
                                ->update([
                        'codeBanque' => $this->codeBanque,
                        'nomBanque' => $this->nomBanque,
                        'contact' => $this->contact,
                    ]);
        $this->form_edit =  NULL;
        $this->dispatchBrowserEvent('ok', [
            'type' => 'success',
            'message'=>'Banque modifié',
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
