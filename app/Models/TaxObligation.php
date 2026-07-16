<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaxObligation extends Model
{
    protected $fillable = [

        'client_id',

        'tax_type',

        'frequency',

        'effective_date',

        'next_due_date',

        'last_filed_date',

        'status',

        'remarks'

    ];

    protected $casts = [

        'effective_date' => 'date',

        'next_due_date' => 'date',

        'last_filed_date' => 'date',

    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}