<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;

class VatPurchaseController extends Controller
{
    public function index(VatAnalysis $vatAnalysis)
    {
        $purchases = $vatAnalysis->purchases()
            ->latest('invoice_date')
            ->paginate(25);

        return view(
            'vat_analyses.purchases.index',
            compact('vatAnalysis', 'purchases')
        );
    }
}
