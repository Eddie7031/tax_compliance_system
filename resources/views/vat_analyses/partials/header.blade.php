<div class="card shadow-sm mb-4">

    <div class="card-body">

        <div class="row align-items-center">

            <div class="col-md-2 text-center">

                <img src="{{ asset('images/logo.png') }}"
                     style="height:90px;">

            </div>

            <div class="col-md-8 text-center">

                <h2 class="font-weight-bold mb-1">

                    TAX COMPLIANCE SYSTEM

                </h2>

                <h4 class="text-primary">

                    VAT ANALYSIS REPORT

                </h4>

                <small class="text-muted">

                    Value Added Tax Reconciliation & Analysis

                </small>

            </div>

            <div class="col-md-2 text-right">

                <strong>Report No</strong><br>

                VAT-{{ str_pad($vatAnalysis->id,5,'0',STR_PAD_LEFT) }}

                <br><br>

                <strong>Date</strong><br>

                {{ now()->format('d M Y') }}

            </div>

        </div>

    </div>

</div>



<div class="card shadow-sm">

    <div class="card-header bg-primary text-white">

        <h5 class="mb-0">

            Client Information

        </h5>

    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-md-4">

                <strong>Company</strong><br>

                {{ $vatAnalysis->client->company_name }}

            </div>

            <div class="col-md-4">

                <strong>KRA PIN</strong><br>

                {{ $vatAnalysis->client->pin }}

            </div>

            <div class="col-md-4">

                <strong>VAT Period</strong><br>

                {{ $vatAnalysis->period }}

            </div>

        </div>

        <hr>

        <div class="row">

            <div class="col-md-4">

                <strong>Email</strong><br>

                {{ $vatAnalysis->client->email }}

            </div>

            <div class="col-md-4">

                <strong>Industry</strong><br>

                {{ $vatAnalysis->client->industry }}

            </div>

            <div class="col-md-4">

                <strong>Status</strong><br>

                <span class="badge badge-success">

                    {{ $vatAnalysis->status }}

                </span>

            </div>

        </div>

    </div>

</div>