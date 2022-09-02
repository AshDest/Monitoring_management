<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Monnaie_Electronique extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeOperateur',
        'numTel',
        'soldeUSD',
        'soldeCDF',
        'structure_id',
        'GLMonnaieE'
    ];

    public function structure()
    {
        return $this->belongsTo(Structure::class, 'codeOperateur');
    }
    public function operateur()
    {
        return $this->belongsTo(Operateur_tel::class, 'codeOperateur');
    }
}
