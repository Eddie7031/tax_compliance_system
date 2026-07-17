<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SalesImport;
use App\Imports\PurchaseImport;

class VatImportController extends Controller
{
    /**
     * Show Sales Import Page
     */
    public function salesForm(VatAnalysis $vatAnalysis)
    {
        return view('vat_imports.sales_import', compact('vatAnalysis'));
    }

    /**
     * Import Sales Excel/CSV
     */
    public function importSales(Request $request, VatAnalysis $vatAnalysis)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(
            new SalesImport($vatAnalysis->id),
            $request->file('file')
        );

        return redirect()
            ->route('vat-analyses.show', $vatAnalysis)
            ->with('success', 'Sales imported successfully.');
    }

    /**
     * Show Purchase Import Page
     */
    public function purchaseForm(VatAnalysis $vatAnalysis)
    {
        return view('vat_imports.purchases_import', compact('vatAnalysis'));
    }

    /**
     * Import Purchase Excel/CSV
     */
    public function importPurchases(Request $request, VatAnalysis $vatAnalysis)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(
            new PurchaseImport($vatAnalysis->id),
            $request->file('file')
        );

        return redirect()
            ->route('vat-analyses.show', $vatAnalysis)
            ->with('success', 'Purchases imported successfully.');
    }
}