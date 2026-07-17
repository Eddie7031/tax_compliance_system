<div class="card border-0 shadow-sm mb-4 report-header">

    <div class="card-body">

        <div class="row align-items-center">

            <!-- Logo -->
            <div class="col-md-2 text-center">

                <img src="{{ asset('images/logo.png') }}"
                     alt="ENJ East Africa LLP"
                     style="max-height:95px;">

            </div>

            <!-- Company Details -->
            <div class="col-md-8 text-center">

                <h2 class="mb-1 font-weight-bold text-primary">
                    ENJ EAST AFRICA LLP
                </h2>

                <h6 class="text-muted mb-2">
                    Tax • Audit • Advisory
                </h6>

                <h3 class="font-weight-bold text-dark">
                    VAT RECONCILIATION REPORT
                </h3>

            </div>

            <!-- Report Details -->
            <div class="col-md-2 text-end">

                <small class="text-muted">

                    <strong>Date</strong><br>
                    {{ now()->format('d M Y') }}

                    <br><br>

                    <strong>Reference</strong><br>
                    VAT-{{ str_pad($vatAnalysis->id,5,'0',STR_PAD_LEFT) }}

                </small>

            </div>

        </div>

        <hr style="border-top:3px solid #003366;">

        <!-- Client Information -->
        <div class="card bg-light border mb-0">

            <div class="card-header bg-primary text-white">

                <strong>CLIENT INFORMATION</strong>

            </div>

            <div class="card-body p-3">

                <div class="row">

                    <div class="col-md-6">

                        <table class="table table-borderless table-sm mb-0">

                            <tr>
                                <th width="35%">Client</th>
                                <td>{{ $vatAnalysis->client->company_name }}</td>
                            </tr>
                        </table>

                    </div>

                    <div class="col-md-6">

                        <table class="table table-borderless table-sm mb-0">

                            <tr>
                                <th width="35%">VAT Period</th>

                                <td>
                                    {{ \Carbon\Carbon::parse($vatAnalysis->period.'-01')->format('F Y') }}
                                </td>

                            </tr>

                            <tr>

                                <th>Prepared On</th>

                                <td>{{ now()->format('d M Y H:i') }}</td>
                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>