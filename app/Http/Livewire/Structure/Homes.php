<?php

namespace App\Http\Livewire\Structure;

use App\Models\CategorieArticle;
use Livewire\Component;

class Homes extends Component
{
    public $structure;
    public function render()
    {
        $categArticles = CategorieArticle::whereNotNull('structure_id')
        ->where('structure_id', $this->structure)->get();
        return view('livewire.structure.homes', ['categArticles' => $categArticles]);
    }
}
