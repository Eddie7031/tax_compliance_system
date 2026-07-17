<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use Barryvdh\DomPDF\Facade\Pdf;

class VatPdfController extends Controller
{
    public function download(VatAnalysis $vatAnalysis)
    {
        $vatAnalysis->load([
            'client',
            'sales',
            'purchases'
        ]);

        $pdf = Pdf::loadView(
            'vat_analyses.pdf_report',
            compact('vatAnalysis')
        );

        return $pdf->download(
            'VAT_Report_'.$vatAnalysis->period.'.pdf'
        );
    }
}