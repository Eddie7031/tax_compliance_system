@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tax Compliance & Reconciliation System</h1>
@stop

@section('content')

<div class="row">

    <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $clients }}</h3>
                <p>Clients</p>
            </div>

            <div class="icon">
                <i class="fas fa-users"></i>
            </div>
        </div>
    </div>

</div>

@stop