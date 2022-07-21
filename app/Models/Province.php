<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'designation'
    ];

    public function Ville_Territoire()
    {
        return $this->hasMany(Ville_Territoire::class);
    }
}
