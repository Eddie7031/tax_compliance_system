<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use App\Models\VatTransaction;

class VatReconciliationController extends Controller
{
    public function reconcile(VatAnalysis $vatAnalysis)
    {
        // Get all transactions
        $transactions = VatTransaction::where(
            'vat_analysis_id',
            $vatAnalysis->id
        )
        ->orderBy('transaction_date')
        ->get();

        // Separate Sales and Purchases
        $sales = $transactions->where('transaction_type', 'Sales');

        $purchases = $transactions->where('transaction_type', 'Purchase');

        // Calculate VAT
        $outputVat = $sales->sum('vat_amount');

        $inputVat = $purchases->sum('vat_amount');

        $netVat = $outputVat
            - $inputVat
            - $vatAnalysis->vat_withheld
            - $vatAnalysis->credit_brought_forward;

        // Update database
        $vatAnalysis->update([
            'output_vat' => $outputVat,
            'input_vat' => $inputVat,
            'net_vat' => $netVat,
        ]);

        // Return view
        return view(
            'vat_analyses.reconciliation',
            compact(
                'vatAnalysis',
                'transactions',
                'sales',
                'purchases'
            )
        );
    }
}