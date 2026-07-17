<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;

class VatSalesController extends Controller
{
    public function index(VatAnalysis $vatAnalysis)
    {
        $sales = $vatAnalysis->sales()
            ->latest('invoice_date')
            ->paginate(25);

        return view(
            'vat_analyses.sales.index',
            compact('vatAnalysis', 'sales')
        );
    }
}