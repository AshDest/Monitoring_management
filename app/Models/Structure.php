<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeStructure',
        'designation',
        'adresse_id',
        'avenu',
        'numParcelle',
        'long',
        'lat',
        'numTel1',
        'numTel2',
        'email',
        'siteWeb',
        'rccm',
        'idNational',
        'numImpot',
        'numCNSS'
    ];

    public function monnaie_electronique()
    {
        return $this->hasMany(Monnaie_Electronique::class);
    }

    public function agent()
    {
        return $this->hasMany(Agent::class);
    }
}
