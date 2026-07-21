<form
    id="employeePayrollForm"
    action="{{ route('employee-payrolls.store', $payeAnalysis) }}"
    method="POST">

    @csrf

    <input
        type="hidden"
        name="paye_analysis_id"
        value="{{ $payeAnalysis->id }}">

    <div class="card card-primary">
        <div class="card-body">
            {{-- Employee Information --}}
            <div class="row">
                <div class="col-md-3">
                    <label>Staff No.</label>
                    <input
                        type="text"
                        id="staff_no"
                        name="staff_no"
                        class="form-control"
                        required>
                </div>

                <div class="col-md-5">
                    <label>Name of Employee</label>
                    <input
                        type="text"
                        id="employee_name"
                        name="employee_name"
                        class="form-control"
                        required>
                </div>

                <div class="col-md-4">
                    <label>KRA PIN</label>
                    <input
                        type="text"
                        id="kra_pin"
                        name="kra_pin"
                        class="form-control"
                        required>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-3">
                    <label>ID Number</label>
                    <input
                        type="text"
                        id="id_number"
                        name="id_number"
                        class="form-control"
                        required>
                </div>

                <div class="col-md-3">
                    <label>SHIF No.</label>
                    <input
                        type="text"
                        id="shif_number"
                        name="shif_number"
                        class="form-control">
                </div>

                <div class="col-md-3">
                    <label>NSSF No.</label>
                    <input
                        type="text"
                        id="nssf_number"
                        name="nssf_number"
                        class="form-control">
                </div>

                <div class="col-md-3">
                    <label>Phone No.</label>
                    <input
                        type="text"
                        id="phone"
                        name="phone"
                        class="form-control">
                </div>
            </div>

            <hr>

            {{-- Payroll Calculation --}}
            <div class="row">
                <div class="col-md-3">
                    <label>Basic Pay</label>
                    <input
                        type="number"
                        id="basic_pay"
                        name="basic_pay"
                        class="form-control"
                        oninput="calculatePAYE()"
                        required>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-3">
                    <label>NSSF</label>
                    <input
                        type="text"
                        id="nssf"
                        name="nssf"
                        class="form-control"
                        readonly>
                </div>

                <div class="col-md-3">
                    <label>SHIF</label>
                    <input
                        type="text"
                        id="shif"
                        name="shif"
                        class="form-control"
                        readonly>
                </div>

                <div class="col-md-3">
                    <label>Housing Levy</label>
                    <input
                        type="text"
                        id="housing_levy"
                        name="housing_levy"
                        class="form-control"
                        readonly>
                </div>

                <div class="col-md-3">
                    <label>Taxable Income</label>
                    <input
                        type="text"
                        id="taxable_income"
                        name="taxable_income"
                        class="form-control"
                        readonly>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-md-3">
                    <label>Tax Charge</label>
                    <input
                        type="text"
                        id="tax_charge"
                        name="tax_charge"
                        class="form-control"
                        readonly>
                </div>

                <div class="col-md-3">
                    <label>Tax Relief</label>
                    <input
                        type="text"
                        id="tax_relief"
                        name="tax_relief"
                        class="form-control"
                        readonly>
                </div>

                <div class="col-md-3">
                    <label>PAYE Tax</label>
                    <input
                        type="text"
                        id="paye_tax"
                        name="paye_tax"
                        class="form-control"
                        readonly>
                </div>

                <div class="col-md-3">
                    <label>Net Pay</label>
                    <input
                        type="text"
                        id="net_pay"
                        name="net_pay"
                        class="form-control"
                        readonly>
                </div>
            </div>
        </div> {{-- End Card Body --}}

        <div class="card-footer text-right">
            <button
                type="submit"
                class="btn btn-success">
                <i class="fas fa-save"></i>
                Save Employee
            </button>
        </div>
    </div> {{-- End Card --}}
</form>

