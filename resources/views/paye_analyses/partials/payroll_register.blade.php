<div class="card">

    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

        <h3 class="card-title mb-0">
            <i class="fas fa-users"></i>
            Imported Payroll Register
        </h3>

        <div>

            <a href="{{ route('payroll.export.excel', $payeAnalysis->id) }}"
               class="btn btn-success btn-sm">

                <i class="fas fa-file-excel"></i>
                Export Excel

            </a>

            <a href="{{ route('payroll.export.csv', $payeAnalysis->id) }}"
               class="btn btn-info btn-sm">

                <i class="fas fa-file-csv"></i>
                Export CSV

            </a>

        </div>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-striped table-hover">

            <thead class="table-primary">

            <tr>

                <th>#</th>
                <th>Staff No.</th>
                <th>Name of Employee</th>
                <th>KRA PIN</th>
                <th>ID Number</th>
                <th>SHIF No.</th>
                <th>NSSF No.</th>
                <th>Phone No.</th>

                <th class="text-end">Basic Pay</th>
                <th class="text-end">NSSF</th>
                <th class="text-end">SHIF</th>
                <th class="text-end">Housing Levy</th>
                <th class="text-end">Taxable Income</th>
                <th class="text-end">Tax Charge</th>
                <th class="text-end">Tax Relief</th>
                <th class="text-end">PAYE Tax</th>
                <th class="text-end">Net Pay</th>

            </tr>

            </thead>

            <tbody>

            @forelse($payeAnalysis->payrollRecords as $record)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $record->employee_number }}</td>

                    <td>{{ $record->employee_name }}</td>

                    <td>{{ $record->pin }}</td>

                    <td>{{ $record->id_number }}</td>

                    <td>{{ $record->shif_no }}</td>

                    <td>{{ $record->nssf_no }}</td>

                    <td>{{ $record->phone_no }}</td>

                    <td class="text-end">{{ number_format($record->basic_pay,2) }}</td>

                    <td class="text-end">{{ number_format($record->nssf,2) }}</td>

                    <td class="text-end">{{ number_format($record->shif,2) }}</td>

                    <td class="text-end">{{ number_format($record->housing_levy,2) }}</td>

                    <td class="text-end">{{ number_format($record->taxable_pay,2) }}</td>

                    <td class="text-end">{{ number_format($record->tax_charge,2) }}</td>

                    <td class="text-end">{{ number_format($record->tax_relief,2) }}</td>

                    <td class="text-end">{{ number_format($record->paye,2) }}</td>

                    <td class="text-end">{{ number_format($record->net_pay,2) }}</td>

                </tr>

            @empty

                <tr>

                    <td colspan="17" class="text-center text-muted">

                        No payroll records imported.

                    </td>

                </tr>

            @endforelse

            </tbody>

            <tfoot>

            <tr class="table-success fw-bold">

                <td colspan="8" class="text-end">
                    TOTAL
                </td>

                <td class="text-end">{{ number_format($totals->basic_pay,2) }}</td>

                <td class="text-end">{{ number_format($totals->nssf,2) }}</td>

                <td class="text-end">{{ number_format($totals->shif,2) }}</td>

                <td class="text-end">{{ number_format($totals->housing_levy,2) }}</td>

                <td class="text-end">{{ number_format($totals->taxable_pay,2) }}</td>

                <td class="text-end">{{ number_format($totals->tax_charge,2) }}</td>

                <td class="text-end">{{ number_format($totals->tax_relief,2) }}</td>

                <td class="text-end">{{ number_format($totals->paye,2) }}</td>

                <td class="text-end">{{ number_format($totals->net_pay,2) }}</td>

            </tr>

            </tfoot>

        </table>

    </div>

</div>
