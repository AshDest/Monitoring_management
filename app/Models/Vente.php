<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        'trans_id',
        'dateVente',
        'montantTotal',
        'codeClient',
        'structure_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'codeClient');
    }

    public function detail()
    {
        return $this->hasMany(DetailVente::class);
    }
}