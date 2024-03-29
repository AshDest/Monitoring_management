<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'codeClient',
        'noms',
        'telephone',
        'email',
        'adresse',
        'GLClient',
        'structure_id'
    ];

    public function vente()
    {
        return $this->hasMany(Vente::class);
    }
}