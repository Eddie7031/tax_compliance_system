<div class="card shadow-sm border-0 mb-4">

    <div class="card-header bg-white border-bottom">
        <h5 class="mb-0 font-weight-bold">
            1. Purchases
        </h5>
    </div>

    <div class="card-body p-0">

        <table class="table table-sm table-bordered mb-0">

            <thead class="table-light">
                <tr>
                    <th width="5%">#</th>
                    <th width="10%">Date</th>
                    <th width="12%">Invoice</th>
                    <th width="22%">Supplier</th>
                    <th width="12%">KRA PIN</th>
                    <th>Description</th>
                    <th class="text-right" width="12%">Net</th>
                    <th class="text-right" width="12%">VAT</th>
                    <th class="text-right" width="12%">Total</th>
                </tr>
            </thead>

            <tbody>

                @forelse($purchases as $purchase)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $purchase->invoice_date }}</td>
                        <td>{{ $purchase->invoice_number }}</td>
                        <td>{{ $purchase->supplier_name }}</td>
                        <td>{{ $purchase->kra_pin }}</td>
                        <td>{{ $purchase->description }}</td>
                        <td class="text-right">{{ number_format($purchase->net_amount, 2) }}</td>
                        <td class="text-right">{{ number_format($purchase->vat_amount, 2) }}</td>
                        <td class="text-right">{{ number_format($purchase->total_amount, 2) }}</td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="9" class="text-center text-muted">
                            No purchases found.
                        </td>
                    </tr>

                @endforelse

            </tbody>

            <tfoot class="table-secondary">
                <tr>
                    <th colspan="6" class="text-right">
                        TOTAL PURCHASES
                    </th>

                    <th class="text-right">
                        {{ number_format($purchases->sum('net_amount'), 2) }}
                    </th>

                    <th class="text-right">
                        {{ number_format($purchases->sum('vat_amount'), 2) }}
                    </th>

                    <th class="text-right">
                        {{ number_format($purchases->sum('total_amount'), 2) }}
                    </th>
                </tr>
            </tfoot>

        </table>

    </div>

</div>