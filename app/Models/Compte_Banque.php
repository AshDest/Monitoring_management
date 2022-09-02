<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compte_Banque extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeroCompte',
        'codeBanque',
        'designation',
        'agence',
        'solde',
        'structure_id',
        'GLCompteBanque'
    ];

    public function banque()
    {
        return $this->belongsTo(Banque::class, 'codeBanque');
    }
}
