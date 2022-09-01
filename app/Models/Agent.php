<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'noms',
        'sexe',
        'etatcivil',
        'adresse',
        'codeStructure',
        'role'
    ];

    public function structure()
    {
        return $this->belongsTo(Structure::class);
    }

    public function caissier()
    {
        return $this->hasMany(Caissier::class);
    }

    public function utilisateur()
    {
        return $this->hasMany(Utilisateur::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
