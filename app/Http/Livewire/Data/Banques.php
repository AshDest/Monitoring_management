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

    protected $rules = [
        'codeBanque' => 'required',
        'nomBanque' => 'required',
        'contact' => 'required',
    ];

    protected $messages = [
        'codeBanque.required' => 'Ce champs est obligatoire',
        'nomBanque.required' => 'Ce champs est obligatoire',
        'contact.required' => 'Ce champs est obligatoire',
    ];
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    // vider les champs
    public function resetAllFiels()
    {
        $this->codeBanque = '';
        $this->nomBanque = '';
        $this->contact = '';
    }

    public function save()
    {
        $this->validate();
        try {
            Banque::create([
                'codeBanque' => $this->codeBanque,
                'nomBanque' => $this->nomBanque,
                'contact' => $this->contact,
            ])->save();

            $this->resetAllFiels();
            $this->alert('success', 'Success is approaching!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,]);
                // $refresh;
        } catch (\Exception $e) {
            $this->dispatchBrowserEvent('alert', [
                'type' => 'error',
                'message' => "Quelque chose ne va pas lors de l'enregistrement de la classe'!! " . $e->getMessage()
            ]);
        }
    }



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
