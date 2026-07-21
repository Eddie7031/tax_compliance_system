<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\PayeAnalysis;
use Illuminate\Http\Request;

class PayeAnalysisController extends Controller
{
    public function index()
    {
        $analyses = PayeAnalysis::with('client')
            ->latest()
            ->paginate(15);

        return view('paye_analyses.index', compact('analyses'));
    }

    public function create()
    {
        $clients = Client::orderBy('company_name')->get();

        return view('paye_analyses.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'period'    => 'required',
        ]);

        $analysis = PayeAnalysis::create([
            'client_id' => $request->client_id,
            'period'    => $request->period,
            'status'    => 'Draft',
        ]);

        return redirect()->route('paye-analyses.show', $analysis);
    }

    public function show(PayeAnalysis $payeAnalysis)
    {
        $payeAnalysis->load([
            'client',
            'payrollRecords',
            'kraRecords',
            'reconciliations',
        ]);

        // Totals
        $totals = (object) [
            'basic_pay'    => $payeAnalysis->payrollRecords->sum('basic_pay'),
            'nssf'         => $payeAnalysis->payrollRecords->sum('nssf'),
            'shif'         => $payeAnalysis->payrollRecords->sum('shif'),
            'housing_levy' => $payeAnalysis->payrollRecords->sum('housing_levy'),
            'taxable_pay'  => $payeAnalysis->payrollRecords->sum('taxable_pay'),
            'tax_charge'   => $payeAnalysis->payrollRecords->sum('tax_charge'),
            'tax_relief'   => $payeAnalysis->payrollRecords->sum('tax_relief'),
            'paye'         => $payeAnalysis->payrollRecords->sum('paye'),
            'net_pay'      => $payeAnalysis->payrollRecords->sum('net_pay'),
        ];

        // Employee Count
        $employees = $payeAnalysis->payrollRecords->count();

        // Summary
        $summary = [
            'employees'    => $employees,
            'gross_pay'    => $totals->basic_pay,
            'nssf'         => $totals->nssf,
            'shif'         => $totals->shif,
            'housing_levy' => $totals->housing_levy,
            'nita'         => $employees * 50,
            'paye'         => $totals->paye,
            'net_pay'      => $totals->net_pay,
        ];

        return view('paye_analyses.show', compact(
            'payeAnalysis',
            'totals',
            'summary'
        ));
    }

    public function edit(PayeAnalysis $payeAnalysis)
    {
        $clients = Client::orderBy('company_name')->get();

        return view('paye_analyses.edit', compact(
            'payeAnalysis',
            'clients'
        ));
    }

    public function update(Request $request, PayeAnalysis $payeAnalysis)
    {
        $validated = $request->validate([
            'client_id' => 'required',
            'period'    => 'required',
        ]);

        $payeAnalysis->update($validated);

        return redirect()
            ->route('paye-analyses.show', $payeAnalysis)
            ->with('success', 'PAYE Analysis updated successfully.');
    }

    public function destroy(PayeAnalysis $payeAnalysis)
    {
        $payeAnalysis->delete();

        return redirect()
            ->route('paye-analyses.index')
            ->with('success', 'PAYE Analysis deleted successfully.');
    }
    public function updateApproval(Request $request, PayeAnalysis $payeAnalysis)
{

    $validated = $request->validate([

        'prepared_by'=>'nullable|string',

        'prepared_date'=>'nullable|date',

        'reviewed_by'=>'nullable|string',

        'reviewed_date'=>'nullable|date',

        'approved_by'=>'nullable|string',

        'approved_date'=>'nullable|date',

    ]);


    $payeAnalysis->update($validated);


    return redirect()
        ->route('paye-analyses.show',$payeAnalysis)
        ->with('success','Review and approval updated successfully.');

}
}
