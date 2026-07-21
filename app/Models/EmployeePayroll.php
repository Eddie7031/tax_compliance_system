<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeePayroll extends Model
{
    protected $fillable = [

        'paye_analysis_id',

        'staff_no',
        'employee_name',
        'kra_pin',
        'id_number',
        'shif_number',
        'nssf_number',
        'phone',

        'basic_pay',

        'nssf',
        'shif',
        'housing_levy',

        'taxable_income',
        'tax_charge',
        'tax_relief',
        'paye_tax',

        'net_pay'

    ];

    public function payeAnalysis()
    {
        return $this->belongsTo(PayeAnalysis::class);
    }
}
