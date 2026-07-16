<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VatTransaction extends Model
{


protected $fillable=[

'vat_analysis_id',
'transaction_date',
'invoice_number',
'supplier_customer',
'kra_pin',
'description',
'amount_before_vat',
'vat_amount',
'total_amount',
'transaction_type'

];



public function vatAnalysis()
{

return $this->belongsTo(VatAnalysis::class);

}


}