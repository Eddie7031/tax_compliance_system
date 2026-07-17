<?php

namespace App\Http\Controllers;

use App\Models\VatAnalysis;
use Illuminate\Http\Request;

class VatReconciliationController extends Controller
{
    public function review(VatAnalysis $vatAnalysis)
    {
        return view(
            'vat_analyses.review',
            compact('vatAnalysis')
        );
    }

    public function updateReview(
        Request $request,
        VatAnalysis $vatAnalysis
    ) {

        $request->validate([

            'prepared_by' => 'nullable|string|max:255',

            'prepared_date' => 'nullable|date',

            'reviewed_by' => 'nullable|string|max:255',

            'reviewed_date' => 'nullable|date',

            'approved_by' => 'nullable|string|max:255',

            'approved_date' => 'nullable|date',

            'status' => 'required|in:Draft,Reviewed,Approved,Filed',

        ]);

        $vatAnalysis->update([

            'prepared_by' => $request->prepared_by,

            'prepared_date' => $request->prepared_date,

            'reviewed_by' => $request->reviewed_by,

            'reviewed_date' => $request->reviewed_date,

            'approved_by' => $request->approved_by,

            'approved_date' => $request->approved_date,

            'status' => $request->status,

        ]);

        return redirect()

            ->route('vat.review', $vatAnalysis)

            ->with(
                'success',
                'Review details updated successfully.'
            );
    }
}