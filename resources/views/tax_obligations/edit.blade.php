@extends('adminlte::page')

@section('title','Edit Tax Obligation')

@section('content_header')

<div class="d-flex justify-content-between">

    <h1>

        <i class="fas fa-edit"></i>

        Edit Tax Obligation

    </h1>

    <a href="{{ route('clients.show',$taxObligation->client_id) }}"
       class="btn btn-secondary">

        Back

    </a>

</div>

@stop

@section('content')

<div class="card card-primary">

<div class="card-body">

<form action="{{ route('tax-obligations.update',$taxObligation) }}"
      method="POST">

@csrf

@method('PUT')

<div class="form-group">

<label>Tax Type</label>

<select name="tax_type" class="form-control">

<option {{ $taxObligation->tax_type=='VAT'?'selected':'' }}>VAT</option>

<option {{ $taxObligation->tax_type=='PAYE'?'selected':'' }}>PAYE</option>

<option {{ $taxObligation->tax_type=='Income Tax'?'selected':'' }}>Income Tax</option>

<option {{ $taxObligation->tax_type=='Withholding Tax'?'selected':'' }}>Withholding Tax</option>

<option {{ $taxObligation->tax_type=='Turnover Tax'?'selected':'' }}>Turnover Tax</option>

<option {{ $taxObligation->tax_type=='Rental Income Tax'?'selected':'' }}>Rental Income Tax</option>

<option {{ $taxObligation->tax_type=='Digital Service Tax'?'selected':'' }}>Digital Service Tax</option>

<option {{ $taxObligation->tax_type=='Excise Duty'?'selected':'' }}>Excise Duty</option>

<option {{ $taxObligation->tax_type=='Capital Gains Tax'?'selected':'' }}>Capital Gains Tax</option>

<option {{ $taxObligation->tax_type=='Stamp Duty'?'selected':'' }}>Stamp Duty</option>

</select>

</div>

<div class="form-group">

<label>Frequency</label>

<select name="frequency" class="form-control">

<option {{ $taxObligation->frequency=='Monthly'?'selected':'' }}>Monthly</option>

<option {{ $taxObligation->frequency=='Quarterly'?'selected':'' }}>Quarterly</option>

<option {{ $taxObligation->frequency=='Annual'?'selected':'' }}>Annual</option>

</select>

</div>

<div class="form-group">

<label>Effective Date</label>

<input type="date"

name="effective_date"

value="{{ $taxObligation->effective_date->format('Y-m-d') }}"

class="form-control">

</div>

<div class="form-group">

<label>Status</label>

<select name="status" class="form-control">

<option value="Active"

{{ $taxObligation->status=='Active'?'selected':'' }}>

Active

</option>

<option value="Inactive"

{{ $taxObligation->status=='Inactive'?'selected':'' }}>

Inactive

</option>

</select>

</div>

<div class="form-group">

<label>Remarks</label>

<textarea

name="remarks"

class="form-control"

rows="4">{{ $taxObligation->remarks }}</textarea>

</div>

<button class="btn btn-primary">

<i class="fas fa-save"></i>

Update Tax Obligation

</button>

</form>

</div>

</div>

@stop