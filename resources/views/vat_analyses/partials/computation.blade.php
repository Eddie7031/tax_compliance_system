<div class="card mt-4 shadow border-success">

    <div class="card-header bg-success">

        <h4 class="text-white mb-0">
            <i class="fas fa-calculator"></i>
            VAT Computation Summary
        </h4>

    </div>

    <div class="card-body">

        @php

            $totalSales = $sales->sum('net_amount');
            $totalPurchases = $purchases->sum('net_amount');

            $outputVat = $sales->sum('vat_amount');
            $inputVat = $purchases->sum('vat_amount');

            $withheld = $vatAnalysis->vat_withheld ?? 0;
            $credit = $vatAnalysis->credit_brought_forward ?? 0;

            $netVat = $outputVat - $inputVat - $withheld - $credit;

        @endphp

        <table class="table table-bordered">

            <tr class="table-primary">
                <th colspan="2">VAT SUMMARY</th>
            </tr>

            <tr>
                <th width="60%">VAT Period</th>
                <td>{{ $vatAnalysis->period }}</td>
            </tr>

            <tr>
                <th>Total Taxable Sales</th>
                <td class="text-end">
                    KES {{ number_format($totalSales,2) }}
                </td>
            </tr>

            <tr>
                <th>Output VAT</th>
                <td class="text-end text-success">
                    KES {{ number_format($outputVat,2) }}
                </td>
            </tr>

            <tr>
                <th>Total Taxable Purchases</th>
                <td class="text-end">
                    KES {{ number_format($totalPurchases,2) }}
                </td>
            </tr>

            <tr>
                <th>Input VAT</th>
                <td class="text-end text-primary">
                    KES {{ number_format($inputVat,2) }}
                </td>
            </tr>

            <tr>
                <th>VAT Withheld</th>
                <td class="text-end">
                    KES {{ number_format($withheld,2) }}
                </td>
            </tr>

            <tr>
                <th>Credit Brought Forward</th>
                <td class="text-end">
                    KES {{ number_format($credit,2) }}
                </td>
            </tr>

            <tr class="table-warning">

                <th>NET VAT</th>

                <th class="text-end">

                    KES {{ number_format(abs($netVat),2) }}

                    @if($netVat>0)

                        <span class="badge bg-danger">PAYABLE</span>

                    @elseif($netVat<0)

                        <span class="badge bg-success">REFUND</span>

                    @else

                        <span class="badge bg-secondary">NIL</span>

                    @endif

                </th>

            </tr>

        </table>

    </div>

</div>