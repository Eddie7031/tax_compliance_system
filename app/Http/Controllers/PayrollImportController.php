<?php

namespace App\Imports;

use App\Models\PayrollRecord;
use App\Models\PayeAnalysis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PayrollImport implements ToModel, WithHeadingRow
{
    protected $analysis;

    public function __construct(PayeAnalysis $analysis)
    {
        $this->analysis = $analysis;
    }

    public function model(array $row)
    {
        return new PayrollRecord([
            'paye_analysis_id' => $this->analysis->id,

            'employee_no' => $row['employee_no'] ?? null,
            'employee_name' => $row['employee_name'] ?? null,
            'kra_pin' => $row['kra_pin'] ?? null,

            'taxable_pay' => $row['taxable_pay'] ?? 0,
            'paye' => $row['paye'] ?? 0,
        ]);
    }
}
