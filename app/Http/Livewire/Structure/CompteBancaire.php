<?php

namespace App\Http\Livewire\Structure;

use App\Models\Banque;
use App\Models\Compte_Banque;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class CompteBancaire extends Component
{

    public $numeroCompte;
    public $codeBanque;
    public $designation;
    public $agence;
    public $solde;
    public $codeStructure;
    public $GLCompteBanque;

    public $structure;
    public $form_edit;

    public $banque_id;
    public $banques;

    public $ids;
    use LivewireAlert;
    public function modifycmpt(){
        Compte_Banque::whereId($this->form_edit)
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
        $var = Compte_Banque::find($id);

        $this->numeroCompte = $var->numeroCompte;
        $this->codeBanque = $var->codeBanque;
        $this->agence = $var->agence;
        $this->designation = $var->designation;
        $this->GLCompteBanque = $var->GLCompteBanque;
    }
    public function mount()
    {
        $this->banques = Banque::all();
    }
    public function render()
    {
        $comptebancaires = Compte_Banque::where('codeStructure', $this->structure)->get();
        return view('livewire.structure.compte-bancaire', ['comptebancaires' => $comptebancaires]);
    }
}
