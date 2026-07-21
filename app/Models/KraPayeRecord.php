<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KraPayeRecord extends Model
{
    protected $fillable = [

        'paye_analysis_id',

        'employee_no',

        'kra_pin',

        'employee_name',

        'gross_pay',

        'taxable_pay',

        'paye',

        'nssf',

        'shif',

        'housing_levy',

        'period'
    ];

    public function payeAnalysis()
    {
        return $this->belongsTo(PayeAnalysis::class);
    }
}
