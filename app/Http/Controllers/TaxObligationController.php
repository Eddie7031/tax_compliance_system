<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\TaxObligation;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TaxObligationController extends Controller
{

    public function create(Client $client)
    {
        return view('tax_obligations.create', compact('client'));
    }

    public function store(Request $request, Client $client)
    {

        $request->validate([

            'tax_type'=>'required',

            'frequency'=>'required',

            'effective_date'=>'required|date',

            'status'=>'required'

        ]);

        $date = Carbon::parse($request->effective_date);

        if($request->frequency=="Monthly"){

            $nextDue = $date->copy()->addMonth();

        }

        elseif($request->frequency=="Quarterly"){

            $nextDue = $date->copy()->addMonths(3);

        }

        else{

            $nextDue = $date->copy()->addYear();

        }

        TaxObligation::create([

            'client_id'=>$client->id,

            'tax_type'=>$request->tax_type,

            'frequency'=>$request->frequency,

            'effective_date'=>$request->effective_date,

            'next_due_date'=>$nextDue,

            'status'=>$request->status,

            'remarks'=>$request->remarks

        ]);

        return redirect()

            ->route('clients.show',$client)

            ->with('success','Tax obligation added successfully.');

    }

    public function edit(TaxObligation $taxObligation)
    {
        return view(
            'tax_obligations.edit',
            compact('taxObligation')
        );
    }

    public function update(Request $request, TaxObligation $taxObligation)
    {

        $request->validate([

            'tax_type'=>'required',

            'frequency'=>'required',

            'effective_date'=>'required|date',

            'status'=>'required'

        ]);

        $date = Carbon::parse($request->effective_date);

        if($request->frequency=="Monthly"){

            $nextDue = $date->copy()->addMonth();

        }

        elseif($request->frequency=="Quarterly"){

            $nextDue = $date->copy()->addMonths(3);

        }

        else{

            $nextDue = $date->copy()->addYear();

        }

        $taxObligation->update([

            'tax_type'=>$request->tax_type,

            'frequency'=>$request->frequency,

            'effective_date'=>$request->effective_date,

            'next_due_date'=>$nextDue,

            'status'=>$request->status,

            'remarks'=>$request->remarks

        ]);

        return redirect()

            ->route('clients.show',$taxObligation->client_id)

            ->with('success','Tax obligation updated successfully.');

    }

    public function destroy(TaxObligation $taxObligation)
    {

        $client = $taxObligation->client_id;

        $taxObligation->delete();

        return redirect()

            ->route('clients.show',$client)

            ->with('success','Tax obligation deleted successfully.');

    }

}