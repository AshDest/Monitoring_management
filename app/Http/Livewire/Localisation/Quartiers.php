<?php

namespace App\Http\Livewire\Localisation;

use App\Models\Commune_Secteur_Chefferie;
use App\Models\Quartier_Village;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;
class Quartiers extends Component
{
    use LivewireAlert;
    public $code;
    public $designation;
    public $codeSelected;

    public $form_edit;

    public $ids;
    public $communes;

    public function update()
    {
        try {
            Quartier_Village::whereId($this->form_edit)
                ->update([
                    'code' => $this->code,
                    'designation' => $this->designation,
                    'commune_id' => $this->codeSelected,
                ]);
            $this->ResetControle();
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
        $var = Quartier_Village::find($id);
        $this->codeSelected = $var->commune_id;
        $this->code = $var->code;
        $this->designation = $var->designation;
    }

    public function ResetControle()
    {
        $this->codeSelected = '';
        $this->code = '';
        $this->designation = '';
    }

    // public function closeEditForm()
    // {
    //     $this->form_edit =  NULL;
    // }
    protected $listeners = [
        'confirmed'
    ];

    public function confirmed(){
        Quartier_Village::whereId($this->ids)->delete();
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
        $this->communes = Commune_Secteur_Chefferie::all();
    }

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $quartiers = Quartier_Village::paginate(5);
        return view('livewire.localisation.quartiers', ['quartiers' => $quartiers]);
    }
}
