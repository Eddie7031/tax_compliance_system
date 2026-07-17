<div class="card mt-4 border-danger shadow">

    <div class="card-header bg-danger">

        <h4 class="text-white mb-0">

            <i class="fas fa-exclamation-triangle"></i>

            Duplicate Sales Invoice Detection

        </h4>

    </div>

    <div class="card-body">

        @php

            $duplicates = $sales
                ->groupBy('invoice_number')
                ->filter(function ($rows) {
                    return $rows->count() > 1;
                });

        @endphp

        @if($duplicates->isNotEmpty())

            <div class="alert alert-danger">

                <strong>

                    {{ $duplicates->count() }}

                    Duplicate Invoice Number(s) Found

                </strong>

            </div>

            <div class="table-responsive">

                <table class="table table-bordered table-hover">

                    <thead class="table-dark">

                        <tr>

                            <th>#</th>

                            <th>Invoice No.</th>

                            <th>Occurrences</th>

                        </tr>

                    </thead>

                    <tbody>

                    @foreach($duplicates as $invoiceNumber => $rows)

                        <tr class="table-danger">

                            <td>{{ $loop->iteration }}</td>

                            <td>

                                <span class="badge bg-danger">

                                    {{ $invoiceNumber }}

                                </span>

                            </td>

                            <td>

                                {{ $rows->count() }}

                            </td>

                        </tr>

                    @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="alert alert-success">

                <i class="fas fa-check-circle"></i>

                No Duplicate Invoices Detected.

            </div>

        @endif

    </div>

</div>