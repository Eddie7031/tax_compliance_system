<div class="modal fade"
     id="salesImportModal"
     tabindex="-1"
     aria-labelledby="salesImportModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">

        <div class="modal-content">

            <form action="{{ route('vat.sales.import', $vatAnalysis) }}"
                  method="POST"
                  enctype="multipart/form-data">

                @csrf

                <div class="modal-header bg-success text-white">

                    <h5 class="modal-title">
                        <i class="fas fa-file-excel"></i>
                        Import Sales
                    </h5>

                    <button type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"></button>

                </div>

                <div class="modal-body">

                    <input type="file"
                           name="file"
                           class="form-control"
                           accept=".xlsx,.xls,.csv"
                           required>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button class="btn btn-success">
                        <i class="fas fa-upload"></i>
                        Import
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>