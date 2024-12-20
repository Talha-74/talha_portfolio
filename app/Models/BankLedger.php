<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BankLedger extends Model
{
    use HasFactory;

    protected $fillable = ['bank_id', 'description', 'amount', 'type', 'balance'];

    public function bank() : BelongsTo
    {
        return $this->belongsTo(Bank::class);
    }
}
