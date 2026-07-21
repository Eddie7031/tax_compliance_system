<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PayeReconciliation extends Model
{
    protected $fillable = [

        'paye_analysis_id',

        'employee_no',

        'employee_name',

        'status',

        'salary_difference',

        'paye_difference',

        'notes'
    ];

    public function payeAnalysis()
    {
        return $this->belongsTo(PayeAnalysis::class);
    }
}
