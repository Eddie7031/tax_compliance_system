@extends('adminlte::page')

@section('title','Purchase VAT Register')

@section('content_header')

<h1>Purchase VAT Register</h1>

@stop

@section('content')

<div class="card">

    <div class="card-header bg-success">

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
                <th>Supplier</th>
                <th>KRA PIN</th>
                <th>Description</th>
                <th>Net Amount</th>
                <th>VAT</th>
                <th>Total</th>

            </tr>

            </thead>

            <tbody>

            @forelse($purchases as $purchase)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $purchase->transaction_date }}</td>
                    <td>{{ $purchase->invoice_number }}</td>
                    <td>{{ $purchase->supplier_customer }}</td>
                    <td>{{ $purchase->kra_pin }}</td>
                    <td>{{ $purchase->description }}</td>
                    <td>KES {{ number_format($purchase->amount_before_vat,2) }}</td>
                    <td>KES {{ number_format($purchase->vat_amount,2) }}</td>
                    <td>KES {{ number_format($purchase->total_amount,2) }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="9" class="text-center">

                        No Purchase VAT transactions found.

                    </td>

                </tr>

            @endforelse

            </tbody>

            <tfoot>

                <tr class="bg-light">

                    <th colspan="7">

                        Total Input VAT

                    </th>

                    <th>

                        KES {{ number_format($purchases->sum('vat_amount'),2) }}

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