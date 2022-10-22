<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
        'account_id',
        'structure_id'
    ];

    public function accountlevel()
    {
        return $this->belongsTo(AccountLevel::class, 'account_level_id');
    }

    public function accounttype()
    {
        return $this->belongsTo(AccountType::class, 'account_type_id');
    }
    public function account()
    {
        return $this->belongsTo(GLAccount::class, 'account_id');
    }

    public function structure()
    {
        return $this->belongsTo(Structure::class, 'structure_id');
    }
}