<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use App\Exports\VatReconciliationExport;
use Maatwebsite\Excel\Facades\Excel;

class VatExportController extends Controller
{
    public function export(VatAnalysis $vatAnalysis)
    {
        return Excel::download(
            new VatReconciliationExport($vatAnalysis),
            'VAT_Report_'.$vatAnalysis->period.'.xlsx'
            $vatAnalysis->load('client', 'sales', 'purchases');
        );
    }
}