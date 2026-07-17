<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-white border-bottom">
        <h5 class="mb-0 font-weight-bold">
            1. Sales
        </h5>
    </div>

    <div class="card-body p-0">

        <table class="table table-sm table-bordered mb-0">

            <thead class="table-light">

            <tr>

                <th width="5%">#</th>
                <th width="10%">Date</th>
                <th width="12%">Invoice</th>
                <th width="22%">Customer</th>
                <th width="12%">KRA PIN</th>
                <th>Description</th>
                <th class="text-end" width="12%">Net</th>
                <th class="text-end" width="12%">VAT</th>
                <th class="text-end" width="12%">Total</th>

            </tr>

            </thead>

            <tbody>

            @forelse($sales as $sale)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $sale->invoice_date }}</td>

                <td>{{ $sale->invoice_number }}</td>

                <td>{{ $sale->customer_name }}</td>

                <td>{{ $sale->kra_pin }}</td>

                <td>{{ $sale->description }}</td>

                <td class="text-end">{{ number_format($sale->net_amount,2) }}</td>

                <td class="text-end">{{ number_format($sale->vat_amount,2) }}</td>

                <td class="text-end">{{ number_format($sale->total_amount,2) }}</td>

            </tr>

            @empty

            <tr>

                <td colspan="9" class="text-center text-muted">

                    No sales found.

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

                    {{ number_format($sales->sum('net_amount'),2) }}

                </th>

                <th class="text-end">

                    {{ number_format($sales->sum('vat_amount'),2) }}

                </th>

                <th class="text-end">

                    {{ number_format($sales->sum('total_amount'),2) }}

                </th>

            </tr>

            </tfoot>

        </table>

    </div>

</div>