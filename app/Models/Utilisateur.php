<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utilisateur extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent_id',
        'username',
        'password'
    ];

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id');
    }
}
