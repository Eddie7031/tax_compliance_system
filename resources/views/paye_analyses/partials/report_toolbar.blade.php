<button onclick="window.print()"
        class="btn btn-primary">

    <i class="fas fa-print"></i>

    Print Report

</button>
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <button class="btn btn-success"
                data-toggle="modal"
                data-target="#payrollImportModal">

            <i class="fas fa-file-import"></i>

            Import Payroll

        </button>

        <button class="btn btn-warning"
                data-toggle="modal"
                data-target="#kraImportModal">

            <i class="fas fa-file-import"></i>

            Import KRA PAYE

        </button>

    </div>

    <div>

        <a href="{{ route('paye-analyses.index') }}"
           class="btn btn-secondary">

            <i class="fas fa-arrow-left"></i>

            Back

        </a>

    </div>

</div>
