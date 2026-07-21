<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayrollRecord extends Model
{
  protected $fillable = [

    'paye_analysis_id',

    'payroll_date',

    'employee_number',

    'employee_name',

    'pin',

    'id_number',

    'shif_no',

    'nssf_no',

    'phone_no',

    'basic_pay',

    'gross_salary',

    'taxable_pay',

    'paye',

    'nhif',

    'nssf',

    'shif',

    'housing_levy',

    'tax_charge',

    'tax_relief',

    'net_pay',

];
    protected $casts = [

        'pay_period' => 'date',
    ];

    public function payeAnalysis()
    {
        return $this->belongsTo(PayeAnalysis::class);
    }
}
