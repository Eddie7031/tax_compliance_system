<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Client;
use App\Models\VatSale;
use App\Models\VatPurchase;

class VatAnalysis extends Model
{
    protected $fillable = [

    'client_id',
    'period',

    'output_vat',
    'input_vat',

    'vat_withheld',
    'credit_brought_forward',

    'net_vat',

    'prepared_by',
    'prepared_date',

    'reviewed_by',
    'reviewed_date',

    'approved_by',
    'approved_date',

    'status'

];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function sales()
    {
        return $this->hasMany(VatSale::class);
    }

    public function purchases()
    {
        return $this->hasMany(VatPurchase::class);
    }
}