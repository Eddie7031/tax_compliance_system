@extends('adminlte::page')

@section('title','VAT Reconciliation')

@section('content')

<div class="card">

<div class="card-header bg-success">

<h3>VAT Reconciliation</h3>

</div>

<div class="card-body">

<table class="table table-bordered">

<tr>
<th>Output VAT</th>
<td>KES {{ number_format($vatAnalysis->output_vat,2) }}</td>
</tr>

<tr>
<th>Input VAT</th>
<td>KES {{ number_format($vatAnalysis->input_vat,2) }}</td>
</tr>

<tr>
<th>VAT Withheld</th>
<td>KES {{ number_format($vatAnalysis->vat_withheld,2) }}</td>
</tr>

<tr>
<th>Credit B/F</th>
<td>KES {{ number_format($vatAnalysis->credit_brought_forward,2) }}</td>
</tr>

<tr class="table-success">

<th>Net VAT</th>

<td>

<b>

KES {{ number_format($vatAnalysis->net_vat,2) }}

</b>

</td>

</tr>

</table>

</div>

</div>
<div class="card mt-4">

    <div class="card-header bg-primary">

        <h3 class="card-title">
            Imported VAT Transactions
        </h3>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-striped">

            <thead>

                <tr>

                    <th>#</th>

                    <th>Date</th>

                    <th>Invoice</th>

                    <th>Supplier / Customer</th>

                    <th>KRA PIN</th>

                    <th>Description</th>

                    <th class="text-end">Amount</th>

                    <th class="text-end">VAT</th>

                    <th>Type</th>

                </tr>

            </thead>

            <tbody>

                @forelse($transactions as $transaction)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $transaction->transaction_date }}</td>

                    <td>{{ $transaction->invoice_number }}</td>

                    <td>{{ $transaction->supplier_customer }}</td>

                    <td>{{ $transaction->kra_pin }}</td>

                    <td>{{ $transaction->description }}</td>

                    <td class="text-end">
                        {{ number_format($transaction->amount_before_vat,2) }}
                    </td>

                    <td class="text-end">
                        {{ number_format($transaction->vat_amount,2) }}
                    </td>

                    <td>

                        @if($transaction->transaction_type=='Sales')

                            <span class="badge bg-success">
                                Sales
                            </span>

                        @else

                            <span class="badge bg-primary">
                                Purchase
                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="9" class="text-center">

                        No transactions imported.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>
@endsection