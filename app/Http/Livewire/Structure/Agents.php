<?php

namespace App\Http\Livewire\Structure;

use App\Models\Agent;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Agents extends Component
{
    public $matricule;
    public $noms;
    public $sexe;
    public $etatcivil;
    public $adresse;
    public $codeStructure;
    public $structure;

    public $form_edit;
    use LivewireAlert;

    public function modifycmpt(){
        Agent::whereId($this->form_edit)
                                ->update([
                        'matricule' => $this->matricule,
                        'noms' => $this->noms,
                        'etatcivil' => $this->etatcivil,
                        'adresse' => $this->adresse,
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
        Agent::whereId($this->ids)->delete();
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
        $var = Agent::find($id);

        $this->matricule = $var->matricule;
        $this->noms = $var->noms;
        $this->etatcivil = $var->etatcivil;
        $this->adresse = $var->adresse;
    }
    public function render()
    {
        $agents = Agent::whereId($this->structure)->get();
        return view('livewire.structure.agents', ['agents' => $agents]);
    }
}
