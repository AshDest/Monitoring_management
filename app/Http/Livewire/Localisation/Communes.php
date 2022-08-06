<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Commune_Secteur_Chefferie;
use App\Models\Ville_Territoire;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
class Communes extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;
    public $codeSelected;

    public $form_edit;

    public $ids;
    public $provinces;

    public function update()
    {
        try {
            Commune_Secteur_Chefferie::whereId($this->form_edit)
                ->update([
                    'code' => $this->code,
                    'designation' => $this->designation,
                    'ville_id' => $this->codeSelected,
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
        $var = Commune_Secteur_Chefferie::find($id);
        $this->codeSelected = $var->ville_id;
        $this->code = $var->code;
        $this->designation = $var->designation;
    }

    public function closeEditForm()
    {
        $this->form_edit =  NULL;
    }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed(){
        Commune_Secteur_Chefferie::whereId($this->ids)->delete();
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

    public function mount()
    {
        $this->villes = Ville_Territoire::all();
    }
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $communes = Commune_Secteur_Chefferie::paginate(5);
        return view('livewire.localisation.communes', ['communes' => $communes]);
    }
}
