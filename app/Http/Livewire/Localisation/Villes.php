<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Province;
use App\Models\Ville_Territoire;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Villes extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;
    public $codeSelected;

    public $form_edit;

    public $ids;

    public function update()
    {
        try {
            Ville_Territoire::whereId($this->form_edit)
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
        $var = Ville_Territoire::find($id);
        $result = Province::select('designation')->where('id', $id)->first();

        $this->codeSelected = $result->designation;
        $this->code = $var->code;
        $this->designation = $var->designation;
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed(){
        Ville_Territoire::whereId($this->ids)->delete();
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

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $villes = Ville_Territoire::paginate(5);
        return view('livewire.localisation.villes', ['villes' => $villes]);
    }
}
