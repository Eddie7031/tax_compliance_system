<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <a href="{{ route('vat.pdf', $vatAnalysis) }}"
           class="btn btn-danger">
            <i class="fas fa-file-pdf"></i>
            PDF
        </a>

        <a href="{{ route('vat.export', $vatAnalysis) }}"
           class="btn btn-success">
            <i class="fas fa-file-excel"></i>
            Excel
        </a>

        <button onclick="window.print()"
                class="btn btn-primary">
            <i class="fas fa-print"></i>
            Print
        </button>

    </div>

    <div>

        <button class="btn btn-success"
                data-toggle="modal"
                data-target="#salesImportModal">
            <i class="fas fa-upload"></i>
            Import Sales
        </button>

        <button class="btn btn-warning"
                data-toggle="modal"
                data-target="#purchaseImportModal">
            <i class="fas fa-upload"></i>
            Import Purchases
        </button>
<a
href="{{ route('vat.review',$vatAnalysis) }}"
class="btn btn-warning">

<i class="fas fa-user-check"></i>

Review & Approval

</a>
    </div>

</div>