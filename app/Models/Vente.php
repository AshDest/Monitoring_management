<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeVente',
        'dateVente',
        'montantTotal',
        'codeClient',
        'id_structure'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_structure');
    }

    public function detail()
    {
        return $this->hasMany(DetailVente::class);
    }


}
