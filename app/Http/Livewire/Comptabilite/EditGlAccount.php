<?php

namespace App\Http\Livewire\Comptabilite;

use App\Models\AccountLevel;
use App\Models\AccountType;
use App\Models\GLAccount;
use App\Models\GLAccountClasse;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class EditGlAccount extends Component
{
    use LivewireAlert;
    public $code;
    public $description;
    public $balance;
    public $isAccount_system;
    public $account_type_id;
    public $account_level_id;
    public $currency_id;
    public $account_id;
    public $account_classe;
    public $ids;

    protected $rules = [
        'code' => 'required',
        'description' => 'required',
        // 'isAccount_system' => 'required', // default Values
        'account_type_id' => 'required',
        'account_level_id' => 'required',
        'currency_id' => 'required',
        'account_classe' => 'required'
    ];
    public function resetAllFiels()
    {
        $this->code = '';
        $this->description = '';
        $this->balance = '';
        $this->code = '';
        $this->description = '';
        $this->balance = '';
    }
    // realtime validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $vars = GLAccount::find($this->ids);
        $this->code = $vars->code;
        $this->description = $vars->description;
        $this->account_type_id = $vars->account_type_id;
        $this->account_level_id = $vars->account_level_id;
        $this->currency_id = $vars->currency_id;
        $this->account_classe = $vars->account_classe;
    }

    public function edit()
    {
        $this->validate();
        try {
            GLAccount::find($this->ids)->fill([
                'code' => $this->code,
                'description' => $this->description,
                // 'balance' => $this->balance,
                'isAccount_system' => "1",
                'account_type_id' => $this->account_type_id,
                'account_level_id' => $this->account_level_id,
                'currency_id' => $this->currency_id,
                'account_classe' => $this->account_classe,
                // 'account_id' => $this->account_id,
                // 'structure_id' => $this->structure_id,
            ])->save();
            $this->alert('success', 'Structure bien Modifier', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            return redirect()->to(route('glaccount'));
        } catch (\Exception $e) {
            $this->alert('warning', 'Echec de modification!' . $e->getMessage());
        }
    }
    public function render()
    {
        $levels = AccountLevel::all();
        $accounttypes = AccountType::all();
        $classes = GLAccountClasse::all();
        return view('livewire.comptabilite.edit-gl-account', ['levels' => $levels, 'accounttypes' => $accounttypes, 'classes' => $classes]);
    }
}