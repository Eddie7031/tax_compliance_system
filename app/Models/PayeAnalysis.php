<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayeAnalysis extends Model
{
    protected $fillable = [

        'client_id',

        'period',

        'total_gross_pay',

        'total_taxable_pay',

        'total_paye',

        'total_nssf',

        'total_shif',

        'total_housing_levy',

        'status',

        'prepared_by',
        'prepared_date',

        'reviewed_by',
        'reviewed_date',

        'approved_by',
        'approved_date'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
public function employeePayrolls()
{
    return $this->hasMany(EmployeePayroll::class);
}
    public function payrollRecords()
    {
        return $this->hasMany(PayrollRecord::class);
    }

    public function kraRecords()
    {
        return $this->hasMany(KraPayeRecord::class);
    }

    public function reconciliations()
    {
        return $this->hasMany(PayeReconciliation::class);
    }
}
