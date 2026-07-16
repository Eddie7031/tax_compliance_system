@extends('adminlte::page')

@section('title', 'VAT Analysis')

@section('content_header')

<h1>

    VAT Analysis

</h1>

@stop

@section('content')

<div class="card">

    <div class="card-header bg-success">

        <h3 class="card-title">

            Create VAT Analysis

        </h3>

    </div>

    <div class="card-body">

        <div class="alert alert-info">

            <strong>Client:</strong>

            {{ $client->company_name }}

        </div>

        <form action="{{ route('vat-analyses.store') }}" method="POST">

            @csrf

            <input
                type="hidden"
                name="client_id"
                value="{{ $client->id }}">

            <div class="row">

                <div class="col-md-4">

                    <label>Period</label>

                    <input
                        type="month"
                        name="period"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-4">

                    <label>Credit B/F</label>

                    <input
                        type="number"
                        step="0.01"
                        name="credit_brought_forward"
                        class="form-control"
                        value="0">

                </div>

                <div class="col-md-4">

                    <label>VAT Withheld</label>

                    <input
                        type="number"
                        step="0.01"
                        name="vat_withheld"
                        class="form-control"
                        value="0">

                </div>

            </div>

            <br>

            <button class="btn btn-success">

                <i class="fas fa-save"></i>

                Create VAT Analysis

            </button>

        </form>

    </div>

</div>

@stop