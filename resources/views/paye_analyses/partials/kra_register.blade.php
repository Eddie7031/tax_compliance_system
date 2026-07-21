<div class="card mb-4">

    <div class="card-header bg-success text-white">

        <strong>KRA PAYE Register</strong>

    </div>

    <div class="card-body table-responsive">

        <table class="table table-bordered table-striped">

            <thead>

            <tr>

                <th>#</th>
                <th>Employee No</th>
                <th>Employee</th>
                <th>KRA PIN</th>
                <th>Taxable Pay</th>
                <th>PAYE</th>

            </tr>

            </thead>

            <tbody>

            @forelse($payeAnalysis->kraRecords as $record)

                <tr>

                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $record->employee_number }}</td>
                    <td>{{ $record->employee_name }}</td>
                    <td>{{ $record->kra_pin }}</td>

                    <td class="text-end">

                        {{ number_format($record->taxable_pay,2) }}

                    </td>

                    <td class="text-end">

                        {{ number_format($record->paye,2) }}

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6" class="text-center">

                        No KRA Records Imported

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>
