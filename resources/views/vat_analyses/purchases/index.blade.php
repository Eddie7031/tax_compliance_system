@extends('adminlte::page')

@section('title','Purchase Register')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-success">

<div class="d-flex justify-content-between">

<h3 class="mb-0">

<i class="fas fa-file-invoice-dollar"></i>

Sales Register

</h3>

<div>

<a href="{{ route('vat-analyses.show',$vatAnalysis) }}"
class="btn btn-light">

<i class="fas fa-arrow-left"></i>

Back

</a>

</div>

</div>

</div>

<div class="card-body">

<table class="table table-bordered table-hover table-striped">

<thead class="thead-dark">

<tr>

<th>#</th>

<th>Date</th>

<th>Invoice</th>

<th>Customer</th>

<th>PIN</th>

<th>Description</th>

<th class="text-right">Net</th>

<th class="text-right">VAT</th>

<th class="text-right">Total</th>

</tr>

</thead>

<tbody>

@forelse($sales as $sale)

<tr>

<td>{{ $loop->iteration }}</td>

<td>{{ $sale->invoice_date }}</td>

<td>{{ $sale->invoice_number }}</td>

<td>{{ $sale->supplier_name }}</td>

<td>{{ $sale->kra_pin }}</td>

<td>{{ $sale->description }}</td>

<td class="text-right">
{{ number_format($sale->net_amount,2) }}
</td>

<td class="text-right">
{{ number_format($sale->vat_amount,2) }}
</td>

<td class="text-right">
{{ number_format($sale->total_amount,2) }}
</td>

</tr>

@empty

<tr>

<td colspan="9" class="text-center">

No Sales Found

</td>

</tr>

@endforelse

</tbody>

<tfoot>

<tr class="bg-light">

<th colspan="6" class="text-right">

TOTAL

</th>

<th class="text-right">

{{ number_format($sales->sum('net_amount'),2) }}

</th>

<th class="text-right">

{{ number_format($sales->sum('vat_amount'),2) }}

</th>

<th class="text-right">

{{ number_format($sales->sum('total_amount'),2) }}

</th>

</tr>

</tfoot>

</table>

</div>

<div class="card-footer">

{{ $sales->links() }}

</div>

</div>

</div>

@endsection