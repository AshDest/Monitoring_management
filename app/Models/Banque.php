<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banque extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeBanque',
        'nomBanque',
        'contact'
    ];

    public function compte_banque()
    {
        return $this->hasMany(Compte_Banque::class);
    }
}
