<?php

namespace App\Imports;

use App\Models\PayrollRecord;
use App\Models\PayeAnalysis;
use App\Services\PayrollCalculator;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class PayrollImport implements ToModel, WithHeadingRow
{

    protected $payeAnalysis;


    public function __construct(PayeAnalysis $payeAnalysis)
    {

        $this->payeAnalysis = $payeAnalysis;
    }



    public function model(array $row)
    {

        $calculator = new PayrollCalculator();

$salary = preg_replace('/[^0-9.]/', '', $row['basic_pay'] ?? 0);

$salary = (float) $salary;

$result = $calculator->calculate($salary);



        return new PayrollRecord([

            'paye_analysis_id' => $this->payeAnalysis->id,

            'payroll_date' => now(),


            // Employee details

            'employee_number' => $row['staff_no'],

            'employee_name' => $row['name_of_employee'],

            'pin' => $row['kra_pin'],


            'id_number' => $row['id_number'],

            'shif_no' => $row['shif_no'],

            'nssf_no' => $row['nssf_no'],

            'phone_no' => $row['phone_no'],


            // Calculated values
'basic_pay'=>$result['basic_pay'],

'nssf'=>$result['nssf'],

'shif'=>$result['shif'],

'housing_levy'=>$result['housing_levy'],

'taxable_pay'=>$result['taxable_income'],

'tax_charge'=>$result['tax_charge'],

'tax_relief'=>$result['tax_relief'],

'paye'=>$result['paye_tax'],

'net_pay'=>$result['net_pay'],

        ]);

    }

}
