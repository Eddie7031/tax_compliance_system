@extends('adminlte::page')


@section('title','Upload VAT Transactions')


@section('content_header')

<h1>
Upload VAT Transactions
</h1>

@stop



@section('content')


<div class="card card-primary">


<div class="card-header">

VAT Analysis Details

</div>
<div class="alert alert-info">

<h4>
{{ $vatAnalysis->client->company_name }}
</h4>


<p>
<strong>KRA PIN:</strong>

{{ $vatAnalysis->client->pin }}

</p>


<p>
<strong>VAT Period:</strong>

{{ $vatAnalysis->period }}

</p>


</div>

<div class="card-body">


<h4>

{{ $vatAnalysis->client->company_name }}

</h4>


<p>

VAT Period:

<strong>
{{ $vatAnalysis->period }}
</strong>

</p>


<p>

KRA PIN:

<strong>
{{ $vatAnalysis->client->pin }}

</strong>

</p>


</div>


</div>



<div class="card">


<div class="card-header">

Enter Transaction

</div>


<div class="card-body">


<form method="POST"
action="{{ route('vat-transactions.store') }}"
enctype="multipart/form-data">

@csrf
@csrf


<input type="hidden"
name="vat_analysis_id"
value="{{ $vatAnalysis->id }}">



<div class="form-group">

<label>
Upload VAT Excel/CSV File
</label>


<input type="file"
name="file"
class="form-control">


</div>



<button type="submit"
class="btn btn-success">

<i class="fas fa-file-import"></i>
Import Transactions

</button>

<input type="hidden"
name="vat_analysis_id"
value="{{ $vatAnalysis->id }}">



<div class="card-body">


<form method="POST"
action="{{ route('vat-transactions.store') }}">


@csrf
<input type="hidden"
name="vat_analysis_id"
value="{{ $vatAnalysis->id }}">


<label>
Transaction Date
</label>


<input type="date"
name="transaction_date"
class="form-control">


</div>





<div class="form-group">

<label>
Invoice Number
</label>


<input type="text"
name="invoice_number"
class="form-control">


</div>






<div class="form-group">

<label>
Supplier/Customer
</label>


<input type="text"
name="supplier_customer"
class="form-control">


</div>






<div class="form-group">

<label>
VAT Amount
</label>


<input type="number"
step="0.01"
name="vat_amount"
class="form-control">


</div>






<div class="form-group">

<label>
Transaction Type
</label>


<select name="transaction_type"
class="form-control">


<option>
Purchase
</option>


<option>
Sales
</option>


</select>


</div>





<button class="btn btn-success">

Save Transaction

</button>



</form>



</div>


</div>


@stop