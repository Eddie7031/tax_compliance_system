<div class="card mt-4">

    <div class="card-header bg-success text-white">
        <h3 class="card-title">
            <i class="fas fa-calculator"></i> Payroll Summary
        </h3>
    </div>

    <div class="card-body p-0">

        <table class="table table-bordered table-hover mb-0">

            <thead class="table-light">

                <tr>
                    <th>Description</th>
                    <th class="text-end">Amount (KES)</th>
                </tr>

            </thead>

            <tbody>

                <tr>
                    <td>Total Employees</td>
                    <td class="text-end">
                        <strong>{{ number_format($summary['employees']) }}</strong>
                    </td>
                </tr>

                <tr>
                    <td>Total NSSF</td>
                    <td class="text-end">
                        {{ number_format($summary['nssf'],2) }}
                    </td>
                </tr>

                <tr>
                    <td>Total SHIF</td>
                    <td class="text-end">
                        {{ number_format($summary['shif'],2) }}
                    </td>
                </tr>

                <tr>
                    <td>Total Housing Levy</td>
                    <td class="text-end">
                        {{ number_format($summary['housing_levy'],2) }}
                    </td>
                </tr>

                <tr>
                    <td>Total NITA </td>
                    <td class="text-end">
                        {{ number_format($summary['nita'],2) }}
                    </td>
                </tr>

                <tr class="table-success">

                    <th>Total Net Pay</th>

                    <th class="text-end">
                        {{ number_format($summary['net_pay'],2) }}
                    </th>

                </tr>

            </tbody>

        </table>

    </div>

</div>
