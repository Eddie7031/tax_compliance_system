@extends('adminlte::page')

@section('title', 'PAYE Working Paper')

@section('content')

@include('paye_analyses.partials.report_toolbar')

<div class="container-fluid">

    {{-- Report Header --}}
    @include('paye_analyses.partials.report_header')


    <hr>

    {{-- PAYE Calculator --}}
   {{-- PAYE Calculator Button --}}
<button class="btn btn-info mb-3"
        data-toggle="modal"
        data-target="#payeCalculatorModal">

    <i class="fas fa-calculator"></i>

    Open PAYE Calculator

</button>

    <br>

    {{-- Employee Payroll Register --}}
    @include('paye_analyses.partials.employee_payroll_register')

    <br>

    {{-- Imported Payroll Register --}}
    @include('paye_analyses.partials.payroll_register')
@include('paye_analyses.partials.payroll_summary')
    {{-- KRA Register removed --}}
{{-- @include('paye_analyses.partials.kra_register') --}}
<button class="btn btn-primary mb-3"
data-toggle="modal"
data-target="#approvalModal">

<i class="fas fa-edit"></i>
Update Review & Approval

</button>
@include('paye_analyses.partials.approval_modal')
    {{-- Signatures --}}
    @include('paye_analyses.partials.signatures')

</div>

{{-- Import Payroll Modal --}}
@include('paye_analyses.partials.payroll_modal')
{{-- PAYE Calculator Modal --}}
<div class="modal fade" id="payeCalculatorModal">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">


            <div class="modal-header bg-info text-white">

                <h5 class="modal-title">

                    <i class="fas fa-calculator"></i>

                    PAYE Calculator

                </h5>


                <button type="button"
                        class="close text-white"
                        data-dismiss="modal">

                    &times;

                </button>


            </div>


            <div class="modal-body">


                @include('paye_analyses.partials.paye_calculator')


            </div>


            <div class="modal-footer">

                <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">

                    Close

                </button>

            </div>


        </div>

    </div>

</div>
{{-- Import KRA Modal --}}
@include('paye_analyses.partials.kra_modal')


@endsection


@section('css')
<style>
@media print {

    .main-header,
    .main-sidebar,
    .main-footer,
    .btn,
    .modal {
        display:none !important;
    }


}

    .card {

        border:none !important;

    }


    body {

        font-size:12px;

    }


    .table {

        font-size:12px;

    }


}

</style>
<link rel="stylesheet"
      href="https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css">

@endsection


@section('js')

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>

<script>

function calculatePAYE() {

    let basic = parseFloat($('#basic_pay').val()) || 0;

    // NSSF (6% of pensionable pay capped at KES 108,000)
    let pensionablePay = Math.min(basic, 108000);
    let nssf = pensionablePay * 0.06;

    // SHIF (2.75% with minimum KES 300)
    let shif = Math.max(basic * 0.0275, 300);

    // Housing Levy (1.5%)
    let housing = basic * 0.015;

    // Taxable Income
    let taxable = Math.max(
        basic - nssf - shif - housing,
        0
    );

    // PAYE Tax
    let tax = 0;

    if (taxable <= 24000) {

        tax = taxable * 0.10;

    } else if (taxable <= 32333) {

        tax =
            (24000 * 0.10) +
            ((taxable - 24000) * 0.25);

    } else if (taxable <= 500000) {

        tax =
            (24000 * 0.10) +
            (8333 * 0.25) +
            ((taxable - 32333) * 0.30);

    } else if (taxable <= 800000) {

        tax =
            (24000 * 0.10) +
            (8333 * 0.25) +
            ((500000 - 32333) * 0.30) +
            ((taxable - 500000) * 0.325);

    } else {

        tax =
            (24000 * 0.10) +
            (8333 * 0.25) +
            ((500000 - 32333) * 0.30) +
            (300000 * 0.325) +
            ((taxable - 800000) * 0.35);

    }

    let relief = 2400;

    let paye = Math.max(tax - relief, 0);

    let net =
        basic -
        nssf -
        shif -
        housing -
        paye;

    $('#nssf').val(nssf.toFixed(2));
    $('#shif').val(shif.toFixed(2));
    $('#housing_levy').val(housing.toFixed(2));
    $('#taxable_income').val(taxable.toFixed(2));
    $('#tax_charge').val(tax.toFixed(2));
    $('#tax_relief').val(relief.toFixed(2));
    $('#paye_tax').val(paye.toFixed(2));
    $('#net_pay').val(net.toFixed(2));
}function calculatePAYE() {

    let basic = parseFloat($('#basic_pay').val()) || 0;

    // NSSF (6% of pensionable pay capped at KES 108,000)
    let pensionablePay = Math.min(basic, 108000);
    let nssf = pensionablePay * 0.06;

    // SHIF (2.75% with minimum KES 300)
    let shif = Math.max(basic * 0.0275, 300);

    // Housing Levy (1.5%)
    let housing = basic * 0.015;

    // Taxable Income
    let taxable = Math.max(
        basic - nssf - shif - housing,
        0
    );

    // PAYE Tax
    let tax = 0;

    if (taxable <= 24000) {

        tax = taxable * 0.10;

    } else if (taxable <= 32333) {

        tax =
            (24000 * 0.10) +
            ((taxable - 24000) * 0.25);

    } else if (taxable <= 500000) {

        tax =
            (24000 * 0.10) +
            (8333 * 0.25) +
            ((taxable - 32333) * 0.30);

    } else if (taxable <= 800000) {

        tax =
            (24000 * 0.10) +
            (8333 * 0.25) +
            ((500000 - 32333) * 0.30) +
            ((taxable - 500000) * 0.325);

    } else {

        tax =
            (24000 * 0.10) +
            (8333 * 0.25) +
            ((500000 - 32333) * 0.30) +
            (300000 * 0.325) +
            ((taxable - 800000) * 0.35);

    }

    let relief = 2400;

    let paye = Math.max(tax - relief, 0);

    let net =
        basic -
        nssf -
        shif -
        housing -
        paye;

    $('#nssf').val(nssf.toFixed(2));
    $('#shif').val(shif.toFixed(2));
    $('#housing_levy').val(housing.toFixed(2));
    $('#taxable_income').val(taxable.toFixed(2));
    $('#tax_charge').val(tax.toFixed(2));
    $('#tax_relief').val(relief.toFixed(2));
    $('#paye_tax').val(paye.toFixed(2));
    $('#net_pay').val(net.toFixed(2));
}

</script>

@endsection
