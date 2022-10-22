<?php

namespace App\Http\Livewire\Comptabilite;

use Livewire\Component;

class AddGlAccount extends Component
{
    public $code;
    public $description;
    public $balance;
    public $isAccount_system;
    public $account_type_id;
    public $account_level_id;
    public $currency_id;
    public $account_id;

    protected $rules = [
        'code' => 'required',
        'description' => 'required',
        'isAccount_system' => 'required', // default Values
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
    public function render()
    {
        return view('livewire.comptabilite.add-gl-account');
    }
}