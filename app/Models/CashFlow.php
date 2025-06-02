<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    protected $fillable = [
        'bank_id', 'type', 'amount', 'description', 'date'
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}
