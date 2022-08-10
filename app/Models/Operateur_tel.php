<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operateur_tel extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nomOperateur',
        'numTel'
    ];

    public function monnaielectronique()
    {
        return $this->hasMany(Monnaie_Electronique::class);
    }
}
