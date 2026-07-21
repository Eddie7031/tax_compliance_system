<div class="modal fade"
     id="payrollImportModal"
     tabindex="-1"
     aria-hidden="true">

    <div class="modal-dialog">

        <form method="POST"
              action="{{ route('paye.payroll.import', $payeAnalysis) }}"
              enctype="multipart/form-data">

            @csrf

            <div class="modal-content">

                <div class="modal-header">

                    <h5 class="modal-title">
                        Import Payroll
                    </h5>

                    <button type="button"
                            class="close"
                            data-dismiss="modal">

                        <span>&times;</span>

                    </button>

                </div>

                <div class="modal-body">

                    <div class="form-group">

                        <label>Select Payroll Excel</label>

                        <input
                            type="file"
                            name="file"
                            class="form-control"
                            required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal">

                        Cancel

                    </button>

                    <button type="submit"
                            class="btn btn-success">

                        <i class="fas fa-upload"></i>

                        Import Payroll

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>
