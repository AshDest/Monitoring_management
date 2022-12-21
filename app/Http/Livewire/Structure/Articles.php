<?php

namespace App\Http\Livewire\Structure;

use App\Models\Article;
use Livewire\Component;

class Articles extends Component
{
    public $structure;
    public function render()
    {
        $articles = Article::where('structure_id', $this->structure)->orderBy('designation', 'ASC')->get();
        return view('livewire.structure.articles', ['articles' => $articles]);
    }
}