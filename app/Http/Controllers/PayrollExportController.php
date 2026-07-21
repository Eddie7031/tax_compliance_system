<?php

namespace App\Http\Controllers;

use App\Exports\PayrollExport;
use App\Models\PayeAnalysis;
use Maatwebsite\Excel\Facades\Excel;

class PayrollExportController extends Controller
{
    public function excel(PayeAnalysis $payeAnalysis)
    {
        return Excel::download(
            new PayrollExport($payeAnalysis->id),
            'Payroll.xlsx'
        );
    }

    public function csv(PayeAnalysis $payeAnalysis)
    {
        return Excel::download(
            new PayrollExport($payeAnalysis->id),
            'Payroll.csv',
            \Maatwebsite\Excel\Excel::CSV
        );
    }
}
