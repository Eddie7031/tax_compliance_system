@extends('adminlte::page')

@section('title', 'VAT Reconciliation Report')

@section('content')

{{-- Toolbar --}}
@include('vat_analyses.partials.report_toolbar')

<div class="report-page">

    <div class="container-fluid py-4">

        {{-- Report Header --}}
        @include('vat_analyses.partials.report_header')

        <hr class="report-divider">

        {{-- Sales Register --}}
        @include('vat_analyses.partials.sales')

        <br>

        {{-- Purchase Register --}}
        @include('vat_analyses.partials.purchases')

        <br>

        {{-- VAT Computation --}}
        @include('vat_analyses.partials.computation')

        <br>

        {{-- Signatures --}}
        @include('vat_analyses.partials.signatures')

    </div>

    {{-- Footer --}}
    <div class="report-footer">
        <strong>CONFIDENTIAL</strong> |
        ENJ EAST AFRICA LLP |
        Tax • Audit • Advisory |
        Generated on {{ now()->format('d M Y H:i') }}
    </div>

</div>

{{-- ========================================================= --}}
{{-- IMPORTANT: Keep the modals OUTSIDE the report container --}}
{{-- ========================================================= --}}

@include('vat_analyses.partials.sales_modal')
@include('vat_analyses.partials.purchase_modal')

@endsection

@push('css')
<style>

/*************************************************
GENERAL
*************************************************/

body{
    background:#f4f6f9;
    font-family:Arial, Helvetica, sans-serif;
    color:#333;
}

/*************************************************
REPORT PAGE
*************************************************/

.report-page{
    position:relative;
    min-height:100vh;
    background:#fff;
    border-radius:10px;
    overflow:hidden;
    padding-bottom:30px;
    box-shadow:0 5px 20px rgba(0,0,0,.08);
}

/*************************************************
WATERMARK
*************************************************/

.report-page::before{

    content:"";

    position:absolute;

    top:50%;

    left:50%;

    transform:translate(-50%,-50%);

    width:850px;

    height:850px;

    background:url('{{ asset("images/logo.png") }}')
               no-repeat center center;

    background-size:60%;

    opacity:.04;

    pointer-events:none;

    z-index:0;

}

/*************************************************
CONTENT ABOVE WATERMARK
*************************************************/

.report-page .container-fluid{

    position:relative;

    z-index:1;

}

/*************************************************
HEADER
*************************************************/

.report-header{

    border-top:5px solid #003366;

}

.report-header h2{

    color:#003366;

    font-weight:bold;

}

.report-header h3{

    color:#222;

}

.report-divider{

    border-top:3px solid #003366;

}

/*************************************************
CARDS
*************************************************/

.card{

    border:none;

    border-radius:10px;

    box-shadow:0 2px 10px rgba(0,0,0,.08);

    margin-bottom:25px;

}

.card-header{

    background:#003366!important;

    color:white!important;

    font-weight:bold;

}

/*************************************************
TABLES
*************************************************/

.table{

    font-size:13px;

}

.table thead{

    background:#003366;

    color:white;

}

.table thead th{

    text-align:center;

    vertical-align:middle;

}

.table tbody td{

    vertical-align:middle;

}

.table tbody tr:nth-child(even){

    background:#f8f9fa;

}

.table-hover tbody tr:hover{

    background:#fff8e1;

}

/*************************************************
HEADER TABLES
*************************************************/

.report-header table th{

    color:#003366;

    font-weight:600;

}

.report-header table td{

    color:#444;

}

/*************************************************
BUTTONS
*************************************************/

.btn-primary{

    background:#003366;

    border-color:#003366;

}

/*************************************************
FOOTER
*************************************************/

.report-footer{

    position:relative;

    margin-top:40px;

    border-top:1px solid #ddd;

    padding:10px;

    text-align:center;

    font-size:11px;

    color:#666;

    background:#fff;

}

/*************************************************
PRINT
*************************************************/

@media print{

    .btn,
    .navbar,
    .sidebar,
    .main-header,
    .main-footer,
    .report-toolbar{

        display:none!important;

    }

    .content-wrapper{

        margin:0!important;

        padding:0!important;

    }

    .report-page{

        box-shadow:none;

        border:none;

        border-radius:0;

    }

    .card{

        border:1px solid #ddd;

        box-shadow:none;

    }

    table{

        font-size:11px;

    }

}

</style>
@endpush