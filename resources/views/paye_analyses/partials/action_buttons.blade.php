<div class="mb-3">

    <button class="btn btn-success"
            data-toggle="modal"
            data-target="#payrollImportModal">

        <i class="fas fa-file-import"></i>

        Import Payroll

    </button>


    <button class="btn btn-warning"
            data-toggle="modal"
            data-target="#kraImportModal">

        <i class="fas fa-upload"></i>

        Import KRA

    </button>


    <a href="#calculator"
       class="btn btn-primary">

        <i class="fas fa-calculator"></i>

        PAYE Calculator

    </a>


    <a href="{{ route('vat.export.excel',$payeAnalysis->id) }}"
       class="btn btn-info">

        <i class="fas fa-file-excel"></i>

        Excel

    </a>


    <a href="#"
       class="btn btn-danger">

        <i class="fas fa-file-pdf"></i>

        PDF

    </a>


</div>
