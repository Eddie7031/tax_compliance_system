@extends('adminlte::page')


@section('title','Duplicate Invoice Detection')


@section('content_header')

<h1>
Duplicate Invoice Detection
</h1>

@stop



@section('content')


<div class="card">

<div class="card-header bg-danger">

<h3 class="card-title">
Duplicate Invoices Found
</h3>

</div>



<div class="card-body">


@if($duplicates->count()==0)

<div class="alert alert-success">

No duplicate invoices detected.

</div>


@else


@foreach($duplicates as $invoice=>$transactions)


<h4 class="mt-4">

Invoice Number:
<strong>
{{ $invoice }}
</strong>

</h4>


<table class="table table-bordered table-striped">


<thead class="thead-dark">

<tr>

<th>Date</th>

<th>Supplier / Customer</th>

<th>KRA PIN</th>

<th>Description</th>

<th>Amount Before VAT</th>

<th>VAT</th>

<th>Total Amount</th>

<th>Type</th>

</tr>

</thead>



<tbody>


@foreach($transactions as $transaction)


<tr>


<td>
{{ $transaction->transaction_date }}
</td>


<td>
{{ $transaction->supplier_customer }}
</td>


<td>
{{ $transaction->kra_pin }}
</td>


<td>
{{ $transaction->description }}
</td>


<td>
{{ number_format($transaction->amount_before_vat,2) }}
</td>


<td>
{{ number_format($transaction->vat_amount,2) }}
</td>


<td>
{{ number_format($transaction->total_amount,2) }}
</td>


<td>

<span class="badge badge-warning">

{{ $transaction->transaction_type }}

</span>

</td>


</tr>


@endforeach


</tbody>


</table>


<div class="alert alert-danger">

<strong>
Duplicate Count:
</strong>

{{ $transactions->count() }}

records


</div>


@endforeach


@endif


</div>


</div>


@stop