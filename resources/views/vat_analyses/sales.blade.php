@extends('adminlte::page')

@section('title', 'Sales VAT Register')

@section('content')
<div class="card">
    <div class="card-header bg-primary">
        <h3>Sales VAT Register</h3>
    </div>

    <div class="card-body">

        <table class="table table-bordered table-striped">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Invoice</th>
                    <th>Customer</th>
                    <th>KRA PIN</th>
                    <th>Description</th>
                    <th>Taxable Value</th>
                    <th>VAT</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>

            @forelse($sales as $sale)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $sale->transaction_date }}</td>

                    <td>{{ $sale->invoice_number }}</td>

                    <td>{{ $sale->supplier_customer }}</td>

                    <td>{{ $sale->kra_pin }}</td>

                    <td>{{ $sale->description }}</td>

                    <td>{{ number_format($sale->amount_before_vat,2) }}</td>

                    <td>{{ number_format($sale->vat_amount,2) }}</td>

                    <td>{{ number_format($sale->total_amount,2) }}</td>

                </tr>

            @empty

                <tr>
                    <td colspan="9" class="text-center">
                        No sales transactions found.
                    </td>
                </tr>

            @endforelse

            </tbody>

        </table>

    </div>
</div>
@endsection