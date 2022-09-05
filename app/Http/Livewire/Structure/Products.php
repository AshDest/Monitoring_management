<?php

namespace App\Http\Livewire\Structure;

use App\Models\Article;
use Livewire\Component;

class Products extends Component
{
    public $structure;
    public function render()
    {
        $products = Article::whereNotNull('structure_id')
        ->where('structure_id', $this->products)->get();
        return view('livewire.structure.products', ['products' => $products]);
    }
}
