<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bank extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'branch', 'opening_balance'];

    function ledgers(): HasMany
    {
        return $this->hasMany(BankLedger::class);
    }
}
