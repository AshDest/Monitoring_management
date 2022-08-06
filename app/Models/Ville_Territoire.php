<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville_Territoire extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'designation',
        'province_id'
    ];

    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    public function communesecteurchefferie()
    {
        return $this->hasMany(Commune_Secteur_Chefferie::class);
    }
}
