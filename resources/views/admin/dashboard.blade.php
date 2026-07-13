@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        <i class="fas fa-chart-line"></i>
        Tax Compliance & Reconciliation System
    </h1>
@stop

@section('content')

<div class="row">

    <!-- Total Clients -->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $clients }}</h3>
                <p>Total Clients</p>
            </div>

            <div class="icon">
                <i class="fas fa-users"></i>
            </div>

            <a href="{{ route('clients.index') }}" class="small-box-footer">
                View Clients
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Active Clients -->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ \App\Models\Client::where('is_active',1)->count() }}</h3>
                <p>Active Clients</p>
            </div>

            <div class="icon">
                <i class="fas fa-user-check"></i>
            </div>

            <a href="{{ route('clients.index') }}" class="small-box-footer">
                View Clients
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- Inactive Clients -->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ \App\Models\Client::where('is_active',0)->count() }}</h3>
                <p>Inactive Clients</p>
            </div>

            <div class="icon">
                <i class="fas fa-user-times"></i>
            </div>

            <a href="{{ route('clients.index') }}" class="small-box-footer">
                View Clients
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <!-- New Clients -->
    <div class="col-lg-3 col-md-6 col-sm-12">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ \App\Models\Client::whereMonth('created_at', now()->month)->count() }}</h3>
                <p>New This Month</p>
            </div>

            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>

            <a href="{{ route('clients.create') }}" class="small-box-footer">
                Add Client
                <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

</div>

<div class="card">

    <div class="card-header bg-primary">
        <h3 class="card-title">
            <i class="fas fa-info-circle"></i>
            System Overview
        </h3>
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-6">

                <h4>Modules</h4>

                <ul class="list-group">

                    <li class="list-group-item">
                        <i class="fas fa-users text-primary"></i>
                        Client Management
                    </li>

                    <li class="list-group-item">
                        <i class="fas fa-file-invoice-dollar text-success"></i>
                        VAT Management
                    </li>

                    <li class="list-group-item">
                        <i class="fas fa-money-check-alt text-warning"></i>
                        Withholding Tax
                    </li>

                    <li class="list-group-item">
                        <i class="fas fa-balance-scale text-danger"></i>
                        Tax Reconciliation
                    </li>

                    <li class="list-group-item">
                        <i class="fas fa-folder-open text-info"></i>
                        Document Management
                    </li>

                </ul>

            </div>

            <div class="col-md-6">

                <h4>Upcoming Features</h4>

                <ul class="list-group">

                    <li class="list-group-item">
                        Excel Import
                    </li>

                    <li class="list-group-item">
                        Excel Export
                    </li>

                    <li class="list-group-item">
                        PDF Reports
                    </li>

                    <li class="list-group-item">
                        VAT Reconciliation
                    </li>

                    <li class="list-group-item">
                        Dashboard Analytics
                    </li>

                </ul>

            </div>

        </div>

    </div>

</div>

@stop