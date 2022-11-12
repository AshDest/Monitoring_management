<?php

namespace App\Http\Livewire\Comptabilite;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class GLClasseAccount extends Component
{
    use LivewireAlert;
    public $designation;
    public $details;
    public $ids;
    public function render()
    {
        return view('livewire.comptabilite.g-l-classe-account');
    }
}