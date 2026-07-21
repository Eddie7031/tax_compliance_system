<div class="card mb-4">

    <div class="card-header bg-warning">

        <strong>Employee Reconciliation</strong>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered">

            <thead>

            <tr>

                <th>Employee</th>
                <th>KRA PIN</th>
                <th>Payroll PAYE</th>
                <th>KRA PAYE</th>
                <th>Difference</th>
                <th>Status</th>

            </tr>

            </thead>

            <tbody>

            @forelse($payeAnalysis->reconciliations as $row)

                <tr>

                    <td>{{ $row->employee_name }}</td>

                    <td>{{ $row->kra_pin }}</td>

                    <td>{{ number_format($row->payroll_paye,2) }}</td>

                    <td>{{ number_format($row->kra_paye,2) }}</td>

                    <td>{{ number_format($row->difference,2) }}</td>

                    <td>

                        <span class="badge badge-info">

                            {{ $row->status }}

                        </span>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        No reconciliation available

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
