<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeFournisseur',
        'noms',
        'telephone',
        'email',
        'adresse',
        'GLFournisseur',
        'structure_id'
    ];
}