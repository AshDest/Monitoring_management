<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GLAccountClasse extends Model
{
    use HasFactory;
    protected $fillable = [
        'designation',
        'detail',
    ];

    public function account()
    {
        return $this->hasMany(GLAccount::class);
    }
}