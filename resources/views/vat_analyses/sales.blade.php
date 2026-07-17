<div class="card shadow-sm mt-3">

    <div class="card-header bg-success">

        <h5 class="mb-0 text-white">
            SALES REGISTER
        </h5>

    </div>

    <div class="card-body p-0">

        <table class="table table-bordered table-sm mb-0">

            <thead class="table-light">

            <tr>

                <th>#</th>
                <th>Date</th>
                <th>Invoice</th>
                <th>Customer</th>
                <th>PIN</th>
                <th>Description</th>
                <th class="text-end">Taxable</th>
                <th class="text-end">VAT</th>
                <th class="text-end">Total</th>

            </tr>

            </thead>

            <tbody>

            @forelse($vatAnalysis->sales as $sale)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $sale->invoice_date }}</td>

                    <td>{{ $sale->invoice_number }}</td>

                    <td>{{ $sale->customer_name }}</td>

                    <td>{{ $sale->kra_pin }}</td>

                    <td>{{ $sale->description }}</td>

                    <td class="text-end">
                        {{ number_format($sale->net_amount,2) }}
                    </td>

                    <td class="text-end">
                        {{ number_format($sale->vat_amount,2) }}
                    </td>

                    <td class="text-end">
                        {{ number_format($sale->total_amount,2) }}
                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="9" class="text-center">
                        No Sales Imported
                    </td>

                </tr>

            @endforelse

            </tbody>

            <tfoot class="table-secondary">

                <tr>

                    <th colspan="6" class="text-end">

                        TOTAL SALES

                    </th>

                    <th class="text-end">

                        {{ number_format($vatAnalysis->sales->sum('net_amount'),2) }}

                    </th>

                    <th class="text-end">

                        {{ number_format($vatAnalysis->sales->sum('vat_amount'),2) }}

                    </th>

                    <th class="text-end">

                        {{ number_format($vatAnalysis->sales->sum('total_amount'),2) }}

                    </th>

                </tr>

            </tfoot>

        </table>

    </div>

</div>