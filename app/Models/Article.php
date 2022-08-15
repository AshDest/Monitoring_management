<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'designation',
        'quantite',
        'codeMonnaie',
        'prixUnitaire',
        'stockAlerte',
        'codeCategorie',
        'GLArticle',
        'GLChargeArticle',
        'GLProduitArticle',
        'GLStockArticle',
        'id_structure',
    ];
}
