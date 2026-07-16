@extends('adminlte::page')

@section('title','VAT Analysis Details')


@section('content_header')

<h1>
    VAT Analysis Report
</h1>

@stop



@section('content')


<div class="row">


<div class="col-md-4">

<div class="card card-primary">

<div class="card-header">
Client Information
</div>


<div class="card-body">


<p>
<strong>Company:</strong>

{{ $vatAnalysis->client->company_name ?? 'N/A' }}

</p>


<p>
<strong>KRA PIN:</strong>

{{ $vatAnalysis->client->pin ?? 'N/A' }}

</p>


<p>
<strong>Email:</strong>

{{ $vatAnalysis->client->email ?? 'N/A' }}

</p>


<p>
<strong>Industry:</strong>

{{ $vatAnalysis->client->industry ?? 'N/A' }}

</p>


</div>

</div>

</div>





<div class="col-md-8">


<div class="card card-success">


<div class="card-header">

VAT Reconciliation Summary
<hr>

<h4>Imported VAT Transactions</h4>


<table class="table table-bordered table-striped">

    <thead>
        <tr>
            <th>Date</th>
            <th>Invoice</th>
            <th>Supplier/Customer</th>
            <th>Description</th>
            <th>Type</th>
            <th>VAT</th>
        </tr>
    </thead>

    <tbody>

    @forelse($vatAnalysis->transactions as $transaction)

        <tr>

            <td>{{ $transaction->transaction_date }}</td>

            <td>{{ $transaction->invoice_number }}</td>

            <td>{{ $transaction->supplier_customer }}</td>

            <td>{{ $transaction->description }}</td>

            <td>{{ $transaction->transaction_type }}</td>

            <td>KES {{ number_format($transaction->vat_amount,2) }}</td>

        </tr>

    @empty

        <tr>
            <td colspan="6" class="text-center">
                No transactions imported.
            </td>
        </tr>

    @endforelse

    </tbody>

</table>
</div>


<div class="card-body">


<table class="table table-bordered">


<tr>
<th>VAT Period</th>

<td>
{{ $vatAnalysis->period }}
</td>

</tr>



<tr>
<th>Output VAT (Sales VAT)</th>

<td>
KES {{ number_format($vatAnalysis->output_vat,2) }}
</td>

</tr>



<tr>
<th>Input VAT (Purchase VAT)</th>

<td>
KES {{ number_format($vatAnalysis->input_vat,2) }}
</td>

</tr>



<tr>
<th>VAT Withheld</th>

<td>
KES {{ number_format($vatAnalysis->vat_withheld,2) }}
</td>

</tr>



<tr>
<th>Credit Brought Forward</th>

<td>
KES {{ number_format($vatAnalysis->credit_brought_forward,2) }}
</td>

</tr>



<tr class="bg-light">

<th>
Net VAT Payable/(Credit)
</th>


<td>

<strong>

KES {{ number_format($vatAnalysis->net_vat,2) }}

</strong>

</td>


</tr>


</table>



</div>


</div>


</div>


</div>






<div class="card">


<div class="card-header">

Workflow Approval

</div>


<div class="card-body">


<div class="row">


<div class="col-md-4">

<strong>Prepared By</strong>

<p>
{{ $vatAnalysis->prepared_by ?? 'Pending' }}
</p>

</div>



<div class="col-md-4">

<strong>Reviewed By</strong>

<p>
{{ $vatAnalysis->reviewed_by ?? 'Pending' }}
</p>

</div>




<div class="col-md-4">

<strong>Approved By</strong>

<p>
{{ $vatAnalysis->approved_by ?? 'Pending' }}
</p>

</div>


</div>



</div>

</div>



<a href="{{ route('vat-analyses.index') }}"
class="btn btn-secondary">
    Back
</a>
<a href="{{ route('sales-vat.index', $vatAnalysis) }}"
   class="btn btn-primary">
    <i class="fas fa-shopping-cart"></i> Sales VAT Register
</a>
<a href="{{ route('vat-analyses.reconcile',$vatAnalysis) }}"
class="btn btn-success">

<i class="fas fa-calculator"></i>

Run VAT Reconciliation

</a>
<a href="{{ route('purchase-vat.index', $vatAnalysis) }}"
   class="btn btn-success">
    <i class="fas fa-shopping-basket"></i>
    Purchase VAT Register
</a>

<a href="{{ route('duplicate-invoices.index',$vatAnalysis) }}"
class="btn btn-danger">

<i class="fas fa-copy"></i>

Duplicate Invoice Detection

</a>
<a href="{{ route('vat-analyses.edit',$vatAnalysis->id) }}" 
class="btn btn-primary">

Edit

</a>
<a href="{{ route('vat.export.excel',$vatAnalysis) }}"
class="btn btn-success">

<i class="fas fa-file-excel"></i>

Export Excel

</a>

<a href="{{ route('vat.export.pdf',$vatAnalysis) }}"
class="btn btn-danger">

<i class="fas fa-file-pdf"></i>

Generate PDF Report

</a>
<a href="{{ url('/vat-transactions/create/'.$vatAnalysis->id) }}" 
class="btn btn-success">

<i class="fas fa-upload"></i>
Upload VAT Transactions

</a>
@stop