<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use App\Models\VatTransaction;

class PurchaseVatController extends Controller
{
    public function index(VatAnalysis $vatAnalysis)
    {
        $purchases = VatTransaction::where(
            'vat_analysis_id',
            $vatAnalysis->id
        )
        ->where('transaction_type', 'Purchase')
        ->orderBy('transaction_date')
        ->get();

        return view(
            'vat_analyses.purchase_register',
            compact(
                'vatAnalysis',
                'purchases'
            )
        );
    }
}