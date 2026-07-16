<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VatSale extends Model
{
    protected $fillable = [

        'vat_analysis_id',

        'invoice_date',

        'invoice_number',

        'customer_name',

        'kra_pin',

        'description',

        'vat_rate',

        'net_amount',

        'vat_amount',

        'total_amount'

    ];

    public function analysis()
    {
        return $this->belongsTo(VatAnalysis::class,'vat_analysis_id');
    }
}