@extends('adminlte::page')

@section('title', 'Add Tax Obligation')

@section('content_header')

<div class="d-flex justify-content-between align-items-center">

    <div>

        <h1>
            <i class="fas fa-file-invoice-dollar text-primary"></i>
            Add Tax Obligation
        </h1>

        <small class="text-muted">
            {{ $client->company_name }}
        </small>

    </div>

    <a href="{{ route('clients.show',$client) }}"
       class="btn btn-secondary">

        <i class="fas fa-arrow-left"></i>

        Back to Client

    </a>

</div>

@stop


@section('content')

@if ($errors->any())

<div class="alert alert-danger">

    <h5>
        <i class="icon fas fa-ban"></i>
        Please correct the following errors:
    </h5>

    <ul class="mb-0">

        @foreach ($errors->all() as $error)

            <li>{{ $error }}</li>

        @endforeach

    </ul>

</div>

@endif


<div class="row">

<div class="col-md-8">

<div class="card card-primary card-outline">

<div class="card-header">

<h3 class="card-title">

<i class="fas fa-plus-circle"></i>

New Tax Obligation

</h3>

</div>


<form action="{{ route('tax-obligations.store', $client) }}"
      method="POST">
    @csrf
@csrf

<div class="card-body">

<div class="form-group">

<label>Client</label>

<input type="text"
       class="form-control"
       value="{{ $client->company_name }}"
       readonly>

</div>


<div class="form-group">

<label>Tax Type</label>

<select name="tax_type"
        class="form-control"
        required>

<option value="">Select Tax Type</option>

<option>VAT</option>

<option>PAYE</option>

<option>Income Tax</option>

<option>Withholding Tax</option>

<option>Turnover Tax</option>

<option>Rental Income Tax</option>

<option>Digital Service Tax</option>

<option>Excise Duty</option>

<option>Capital Gains Tax</option>

<option>Stamp Duty</option>

</select>

</div>


<div class="form-group">

<label>Filing Frequency</label>

<select name="frequency"
        class="form-control"
        required>

<option value="">Select Frequency</option>

<option>Monthly</option>

<option>Quarterly</option>

<option>Annual</option>

</select>

</div>


<div class="form-group">

<label>Effective Date</label>

<input type="date"
       name="effective_date"
       class="form-control"
       value="{{ date('Y-m-d') }}"
       required>

</div>


<div class="form-group">

<label>Status</label>

<select name="status"
        class="form-control">

<option>Active</option>

<option>Inactive</option>

</select>

</div>


<div class="form-group">

<label>Remarks</label>

<textarea name="remarks"
          rows="4"
          class="form-control"
          placeholder="Additional notes..."></textarea>

</div>

</div>


<div class="card-footer">

<button class="btn btn-primary">

<i class="fas fa-save"></i>

Save Tax Obligation

</button>

<a href="{{ route('clients.show',$client) }}"
   class="btn btn-secondary">

Cancel

</a>

</div>

</form>

</div>

</div>


<div class="col-md-4">

<div class="card card-info">

<div class="card-header">

<h3 class="card-title">

<i class="fas fa-lightbulb"></i>

Information

</h3>

</div>

<div class="card-body">

<p>
The system automatically calculates the next due date based on the selected filing frequency.
</p>

<table class="table table-bordered">

<tr>

<th>Monthly</th>

<td>+1 Month</td>

</tr>

<tr>

<th>Quarterly</th>

<td>+3 Months</td>

</tr>

<tr>

<th>Annual</th>

<td>+1 Year</td>

</tr>

</table>

</div>

</div>

</div>

</div>

@stop