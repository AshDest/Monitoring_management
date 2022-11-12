<?php

namespace App\Http\Livewire\Comptabilite;

use App\Models\AccountLevel;
use App\Models\AccountType;
use App\Models\GLAccount;
use App\Models\GLAccountClasse;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class AddGlAccount extends Component
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

    protected $rules = [
        'code' => 'required',
        'description' => 'required',
        // 'isAccount_system' => 'required', // default Values
        'account_classe' => 'required',
        'account_type_id' => 'required',
        'account_level_id' => 'required',
        'currency_id' => 'required',
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
    public function save()
    {
        $this->validate();
        try {
            // $this->validate();
            GLAccount::create([
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
            $this->alert('success', 'Saved Successfully', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
            return redirect()->to(route('glaccount'));
        } catch (\Exception $e) {
            $this->alert('success', 'Erreur Enregistrement : ' . $e->getMessage(), [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
            ]);
        }
    }
    public function render()
    {
        $levels = AccountLevel::all();
        $accounttypes = AccountType::all();
        $classes = GLAccountClasse::all();
        return view('livewire.comptabilite.add-gl-account', ['levels' => $levels, 'accounttypes' => $accounttypes, 'classes' => $classes]);
    }
}