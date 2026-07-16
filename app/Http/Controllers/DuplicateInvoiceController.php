<?php

namespace App\Http\Controllers;

use App\Models\VatTransaction;
use App\Models\VatAnalysis;

class DuplicateInvoiceController extends Controller
{

    public function index(VatAnalysis $vatAnalysis)
    {


        $duplicateInvoices = VatTransaction::where(
                'vat_analysis_id',
                $vatAnalysis->id
            )
            ->select(
                'invoice_number'
            )
            ->groupBy(
                'invoice_number'
            )
            ->havingRaw(
                'COUNT(*) > 1'
            )
            ->pluck('invoice_number');


        $duplicates = VatTransaction::where(
                'vat_analysis_id',
                $vatAnalysis->id
            )
            ->whereIn(
                'invoice_number',
                $duplicateInvoices
            )
            ->orderBy(
                'invoice_number'
            )
            ->orderBy(
                'transaction_date'
            )
            ->get()
            ->groupBy(
                'invoice_number'
            );


        return view(
            'vat_analyses.duplicate_invoices',
            compact(
                'vatAnalysis',
                'duplicates'
            )
        );

    }

}