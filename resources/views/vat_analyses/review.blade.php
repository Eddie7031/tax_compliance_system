@extends('adminlte::page')

@section('title','Review & Approval')

@section('content')

<div class="container-fluid">

<div class="card shadow">

<div class="card-header bg-warning">

<h3>

<i class="fas fa-user-check"></i>

Review & Approval

</h3>

</div>

<form
method="POST"
action="{{ route('vat.review.update',$vatAnalysis) }}">

@csrf

@method('PUT')

<div class="card-body">

<div class="row">

<div class="col-md-6">

<div class="form-group">

<label>Prepared By</label>

<input
type="text"
name="prepared_by"
class="form-control"
value="{{ old('prepared_by',$vatAnalysis->prepared_by) }}">

</div>

</div>

<div class="col-md-6">

<div class="form-group">

<label>Prepared Date</label>

<input
type="date"
name="prepared_date"
class="form-control"
value="{{ old('prepared_date',$vatAnalysis->prepared_date) }}">

</div>

</div>

</div>

<hr>

<div class="row">

<div class="col-md-6">

<div class="form-group">

<label>Reviewed By</label>

<input
type="text"
name="reviewed_by"
class="form-control"
value="{{ old('reviewed_by',$vatAnalysis->reviewed_by) }}">

</div>

</div>

<div class="col-md-6">

<div class="form-group">

<label>Reviewed Date</label>

<input
type="date"
name="reviewed_date"
class="form-control"
value="{{ old('reviewed_date',$vatAnalysis->reviewed_date) }}">

</div>

</div>

</div>

<hr>

<div class="row">

<div class="col-md-6">

<div class="form-group">

<label>Approved By</label>

<input
type="text"
name="approved_by"
class="form-control"
value="{{ old('approved_by',$vatAnalysis->approved_by) }}">

</div>

</div>

<div class="col-md-6">

<div class="form-group">

<label>Approved Date</label>

<input
type="date"
name="approved_date"
class="form-control"
value="{{ old('approved_date',$vatAnalysis->approved_date) }}">

</div>

</div>

</div>

<hr>

<div class="row">

<div class="col-md-6">

<div class="form-group">

<label>Status</label>

<select
name="status"
class="form-control">

@foreach(['Draft','Reviewed','Approved','Filed'] as $status)

<option
value="{{ $status }}"
{{ $vatAnalysis->status==$status?'selected':'' }}>

{{ $status }}

</option>

@endforeach

</select>

</div>

</div>

</div>

</div>

<div class="card-footer">

<button
class="btn btn-success">

<i class="fas fa-save"></i>

Save Review

</button>

<a
href="{{ route('vat-analyses.show',$vatAnalysis) }}"
class="btn btn-secondary">

Back

</a>

</div>

</form>

</div>

</div>

@endsection