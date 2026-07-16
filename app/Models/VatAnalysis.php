<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\VatTransaction;
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
        'reviewed_by',
        'approved_by',
        'status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function transactions()
{

return $this->hasMany(VatTransaction::class);

}
}