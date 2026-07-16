<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use App\Exports\VatReconciliationExport;
use Maatwebsite\Excel\Facades\Excel;

class VatExportController extends Controller
{
    public function excel(VatAnalysis $vatAnalysis)
    {
        return Excel::download(
            new VatReconciliationExport($vatAnalysis),
            'VAT_Reconciliation_'.$vatAnalysis->period.'.xlsx'
        );
    }
}