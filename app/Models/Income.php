<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'donor_id', 'amount', 'source', 'description', 'date'
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
