<?php

namespace App\Http\Controllers;

use App\Models\VatTransaction;
use App\Models\VatAnalysis;
use Illuminate\Http\Request;
use App\Imports\VatTransactionsImport;
use Maatwebsite\Excel\Facades\Excel;


class VatTransactionController extends Controller
{

    public function create(VatAnalysis $vatAnalysis)
    {
        return view(
            'vat_transactions.create',
            compact('vatAnalysis')
        );
    }



    public function store(Request $request)
    {

        $request->validate([
            'vat_analysis_id' => 'required|exists:vat_analyses,id',
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);


        Excel::import(
            new VatTransactionsImport(
                $request->vat_analysis_id
            ),
            $request->file('file')
        );


        $vatAnalysis = VatAnalysis::findOrFail(
            $request->vat_analysis_id
        );


        $outputVat = VatTransaction::where(
                'vat_analysis_id',
                $vatAnalysis->id
            )
            ->where(
                'transaction_type',
                'Sales'
            )
            ->sum('vat_amount');



        $inputVat = VatTransaction::where(
                'vat_analysis_id',
                $vatAnalysis->id
            )
            ->where(
                'transaction_type',
                'Purchase'
            )
            ->sum('vat_amount');



        $netVat =
            $outputVat
            - $inputVat
            - $vatAnalysis->vat_withheld
            - $vatAnalysis->credit_brought_forward;



        $vatAnalysis->update([

            'output_vat' => $outputVat,

            'input_vat' => $inputVat,

            'net_vat' => $netVat,

        ]);



        return redirect()
            ->route(
                'vat-analyses.show',
                $vatAnalysis
            )
            ->with(
                'success',
                'VAT transactions imported successfully.'
            );

    }



    public function index()
    {
        $transactions = VatTransaction::latest()->paginate(20);

        return view(
            'vat_transactions.index',
            compact('transactions')
        );
    }



    public function show(VatTransaction $vatTransaction)
    {
        return view(
            'vat_transactions.show',
            compact('vatTransaction')
        );
    }



    public function destroy(VatTransaction $vatTransaction)
    {
        $vatTransaction->delete();

        return back();
    }

}