<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GLAccount extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'description',
        'balance',
        'isAccount_system',
        'account_type_id',
        'account_level_id',
        'currency_id',
        'account_id'
    ];
}