<?php

namespace App\Http\Livewire\Structure;

use App\Models\Monnaie_Electronique;
use App\Models\Operateur_tel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class MonnaiElectronique extends Component
{
    public $structure;
    public $operateurs;
    public $form_edit;
    use LivewireAlert;
    public function modifycmpt(){
        Monnaie_Electronique::whereId($this->form_edit)
                                ->update([
                        'numeroCompte' => $this->numeroCompte,
                        'codeBanque' => $this->codeBanque,
                        'designation' => $this->designation,
                        'agence' => $this->agence,
                        'GLCompteBanque' => $this->GLCompteBanque,
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
        Monnaie_Electronique::whereId($this->ids)->delete();
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
        $var = Monnaie_Electronique::find($id);

        $this->numeroCompte = $var->numeroCompte;
        $this->codeBanque = $var->codeBanque;
        $this->agence = $var->agence;
        $this->designation = $var->designation;
        $this->GLCompteBanque = $var->GLCompteBanque;
    }
    public function mount()
    {
        $this->operateurs = Operateur_tel::all();
    }
    public function render()
    {
        $monnaielectroniques = Monnaie_Electronique::whereId($this->structure)->get();
        return view('livewire.structure.monnai-electronique', ['monnaielectroniques' => $monnaielectroniques]);
    }
}
