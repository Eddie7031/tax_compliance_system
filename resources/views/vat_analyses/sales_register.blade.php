@extends('adminlte::page')

@section('title','Sales VAT Register')

@section('content_header')

<h1>
    Sales VAT Register
</h1>

@stop

@section('content')

<div class="card">

    <div class="card-header bg-primary">

        <h3 class="card-title">

            {{ $vatAnalysis->client->company_name }}

            - VAT Period

            {{ $vatAnalysis->period }}

        </h3>

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

                    <th>Net Amount</th>

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

                    <td>KES {{ number_format($sale->amount_before_vat,2) }}</td>

                    <td>KES {{ number_format($sale->vat_amount,2) }}</td>

                    <td>KES {{ number_format($sale->total_amount,2) }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="9" class="text-center">

                        No Sales VAT transactions found.

                    </td>

                </tr>

            @endforelse

            </tbody>

            <tfoot>

                <tr class="bg-light">

                    <th colspan="7">

                        Total Output VAT

                    </th>

                    <th>

                        KES {{ number_format($sales->sum('vat_amount'),2) }}

                    </th>

                    <th></th>

                </tr>

            </tfoot>

        </table>

    </div>

</div>

<a href="{{ route('vat-analyses.show',$vatAnalysis) }}"
class="btn btn-secondary">

<i class="fas fa-arrow-left"></i>

Back to VAT Analysis

</a>

@stop