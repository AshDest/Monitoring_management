<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quartier_Village extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'designation',
        'commune_id'
    ];

    public function structures()
    {
        return $this->hasMany(Structure::class);
    }

    public function communesecteurchefferie()
    {
        return $this->belongsTo(Commune_Secteur_Chefferie::class, 'commune_id');
    }

}
