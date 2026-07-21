<?php

namespace App\Http\Controllers;

use App\Models\PayeAnalysis;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PayrollImport;
use App\Imports\KraPayeImport;

class PayeImportController extends Controller
{
    public function importPayroll(Request $request, PayeAnalysis $payeAnalysis)
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(
            new PayrollImport($payeAnalysis),
            $request->file('file')
        );

        return back()->with(
            'success',
            'Payroll imported successfully.'
        );
    }

    public function importKra(Request $request, PayeAnalysis $payeAnalysis)
    {
        $request->validate([
            'file'=>'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(
            new KraPayeImport($payeAnalysis),
            $request->file('file')
        );

        return back()->with(
            'success',
            'KRA PAYE imported successfully.'
        );
    }
}
