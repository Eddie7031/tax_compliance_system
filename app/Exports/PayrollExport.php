<?php

namespace App\Exports;

use App\Models\PayrollRecord;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PayrollExport implements FromCollection, WithHeadings
{
    protected $analysisId;

    public function __construct($analysisId)
    {
        $this->analysisId = $analysisId;
    }

    public function collection()
    {
        return PayrollRecord::where(
            'paye_analysis_id',
            $this->analysisId
        )
        ->select(
            'employee_number',
            'employee_name',
            'pin',
            'id_number',
            'shif_no',
            'nssf_no',
            'phone_no',
            'basic_pay',
            'nssf',
            'shif',
            'housing_levy',
            'taxable_pay',
            'tax_charge',
            'tax_relief',
            'paye',
            'net_pay'
        )
        ->get();
    }

    public function headings(): array
    {
        return [
            'Staff No',
            'Employee Name',
            'KRA PIN',
            'ID Number',
            'SHIF No',
            'NSSF No',
            'Phone',
            'Basic Pay',
            'NSSF',
            'SHIF',
            'Housing Levy',
            'Taxable Income',
            'Tax Charge',
            'Tax Relief',
            'PAYE',
            'Net Pay'
        ];
    }
}
