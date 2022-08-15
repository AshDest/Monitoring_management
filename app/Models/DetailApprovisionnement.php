<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailApprovisionnement extends Model
{
    use HasFactory;

    protected $fillable = [
        'idAppro',
        'idArticle',
        'quantite',
        'prix_achat',
    ];
}
