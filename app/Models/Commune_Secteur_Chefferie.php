<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune_Secteur_Chefferie extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'designation',
        'ville_id'
    ];

    public function villeterritoires()
    {
        return $this->belongsTo(Ville_Territoire::class, 'ville_id');
    }

    public function quartier_village()
    {
        return $this->hasMany(Quartier_Village::class);
    }
}
