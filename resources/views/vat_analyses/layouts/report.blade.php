@extends('adminlte::page')

@section('title','VAT Analysis Report')

@section('content')

<div class="container-fluid">

    @include('vat_analyses.partials.header')

    @include('vat_analyses.partials.summary')

    @include('vat_analyses.partials.sales')

    @include('vat_analyses.partials.purchases')

    @include('vat_analyses.partials.duplicates')

    @include('vat_analyses.partials.computation')

    @include('vat_analyses.partials.signatures')

    @include('vat_analyses.partials.footer')

</div>

@stop