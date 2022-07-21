<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caissier extends Model
{
    use HasFactory;

    protected $fillable = [
        'codeAgent',
        'GLCaisse'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }
}
