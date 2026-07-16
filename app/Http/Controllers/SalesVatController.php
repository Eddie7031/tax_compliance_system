<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use App\Models\VatTransaction;

class SalesVatController extends Controller
{
    public function index(VatAnalysis $vatAnalysis)
    {
        $sales = VatTransaction::where(
            'vat_analysis_id',
            $vatAnalysis->id
        )
        ->where('transaction_type', 'Sales')
        ->orderBy('transaction_date')
        ->get();

        return view(
            'vat_analyses.sales_register',
            compact(
                'vatAnalysis',
                'sales'
            )
        );
    }
}