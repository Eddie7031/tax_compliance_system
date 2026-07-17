<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\VatAnalysis;
use Illuminate\Http\Request;

class VatAnalysisController extends Controller
{

    public function index()
    {
        //
    }



    public function create(Request $request)
    {
        $client = Client::findOrFail($request->client);

        return view(
            'vat_analyses.create',
            compact('client')
        );
    }




    public function store(Request $request)
    {

        $request->validate([

            'client_id' => 'required|exists:clients,id',

            'period' => 'required',

            'credit_brought_forward' => 'nullable|numeric',

            'vat_withheld' => 'nullable|numeric',

        ]);



        $vatAnalysis = VatAnalysis::create([

            'client_id' => $request->client_id,

            'period' => $request->period,

            'credit_brought_forward' =>
                $request->credit_brought_forward ?? 0,

            'vat_withheld' =>
                $request->vat_withheld ?? 0,

            'output_vat' => 0,

            'input_vat' => 0,

            'net_vat' => 0,

            'status' => 'Draft',

        ]);



        return redirect()

            ->route(
                'vat-analyses.show',
                $vatAnalysis
            )

            ->with(
                'success',
                'VAT Analysis created successfully.'
            );
    }





public function show(VatAnalysis $vatAnalysis)
{
    // Load relationships
    $vatAnalysis->load([
        'client',
        'sales',
        'purchases',
    ]);

    $sales = $vatAnalysis->sales;
    $purchases = $vatAnalysis->purchases;

    /*
    |--------------------------------------------------------------------------
    | VAT Totals
    |--------------------------------------------------------------------------
    */

    $outputVat = $sales->sum('vat_amount');

    $inputVat = $purchases->sum('vat_amount');

    $netVat =
        $outputVat
        - $inputVat
        - ($vatAnalysis->vat_withheld ?? 0)
        - ($vatAnalysis->credit_brought_forward ?? 0);

    /*
    |--------------------------------------------------------------------------
    | Update Summary
    |--------------------------------------------------------------------------
    */

    $vatAnalysis->update([

        'output_vat' => $outputVat,

        'input_vat' => $inputVat,

        'net_vat' => $netVat,

    ]);

    /*
    |--------------------------------------------------------------------------
    | Duplicate Invoices
    |--------------------------------------------------------------------------
    */

    $duplicateInvoices = $sales
        ->groupBy('invoice_number')
        ->filter(function ($rows) {
            return $rows->count() > 1;
        })
        ->keys();

    /*
    |--------------------------------------------------------------------------
    | Total Transactions
    |--------------------------------------------------------------------------
    */

    $transactions = collect()
        ->merge($sales)
        ->merge($purchases);

    return view(
        'vat_analyses.show',
        compact(
            'vatAnalysis',
            'sales',
            'purchases',
            'transactions',
            'duplicateInvoices',
            'outputVat',
            'inputVat',
            'netVat'
        )
    );
}

    public function edit(VatAnalysis $vatAnalysis)
    {
        //
    }







    public function update(Request $request, VatAnalysis $vatAnalysis)
    {
        //
    }







    public function destroy(VatAnalysis $vatAnalysis)
    {
        //
    }


}