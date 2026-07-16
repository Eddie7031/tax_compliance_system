<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use Barryvdh\DomPDF\Facade\Pdf;

class VatPdfController extends Controller
{

    public function generate(VatAnalysis $vatAnalysis)
    {

        $vatAnalysis->load([
            'client',
            'transactions'
        ]);


        $sales = $vatAnalysis->transactions
            ->where('transaction_type','Sales');


        $purchases = $vatAnalysis->transactions
            ->where('transaction_type','Purchase');


        $duplicates = $vatAnalysis->transactions
            ->groupBy('invoice_number')
            ->filter(function($item){

                return $item->count() > 1;

            });


        $missingPins = $vatAnalysis->transactions
            ->filter(function($transaction){

                return empty($transaction->kra_pin);

            });



        $pdf = Pdf::loadView(
            'vat_analyses.pdf_report',
            compact(
                'vatAnalysis',
                'sales',
                'purchases',
                'duplicates',
                'missingPins'
            )
        );


        return $pdf->download(
            'VAT_Report_'.$vatAnalysis->period.'.pdf'
        );

    }

}