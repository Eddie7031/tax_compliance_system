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


        /*
        |--------------------------------------------------------------------------
        | Load Client Information
        |--------------------------------------------------------------------------
        */


        $vatAnalysis->load('client');





        /*
        |--------------------------------------------------------------------------
        | Detect Duplicate Invoice Numbers
        |--------------------------------------------------------------------------
        |
        | Used for duplicate invoice report.
        |
        */


        $duplicateInvoices = $vatAnalysis

            ->transactions()

            ->select('invoice_number')

            ->whereNotNull('invoice_number')

            ->groupBy('invoice_number')

            ->havingRaw('COUNT(*) > 1')

            ->pluck('invoice_number');







        /*
        |--------------------------------------------------------------------------
        | Clean VAT Transactions
        |--------------------------------------------------------------------------
        |
        | Keep first occurrence of invoice.
        | Remove repeated duplicate entries only.
        |
        */


        $transactions = $vatAnalysis

            ->transactions()

            ->orderBy(
                'transaction_date',
                'asc'
            )

            ->get()

            ->unique(
                'invoice_number'
            )

            ->values();








        /*
        |--------------------------------------------------------------------------
        | VAT Calculations
        |--------------------------------------------------------------------------
        */



        // Sales VAT (Output VAT)

        $outputVat = $transactions

            ->where(
                'transaction_type',
                'Sales'
            )

            ->sum(
                'vat_amount'
            );






        // Purchase VAT (Input VAT)

        $inputVat = $transactions

            ->where(
                'transaction_type',
                'Purchase'
            )

            ->sum(
                'vat_amount'
            );








        /*
        |--------------------------------------------------------------------------
        | Net VAT Position
        |--------------------------------------------------------------------------
        */


        $netVat =

            $outputVat

            - $inputVat

            - ($vatAnalysis->vat_withheld ?? 0)

            - ($vatAnalysis->credit_brought_forward ?? 0);








        /*
        |--------------------------------------------------------------------------
        | Update VAT Analysis Summary
        |--------------------------------------------------------------------------
        */


        $vatAnalysis->update([

            'output_vat' => $outputVat,

            'input_vat' => $inputVat,

            'net_vat' => $netVat,

        ]);








        return view(

            'vat_analyses.show',

            compact(

                'vatAnalysis',

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