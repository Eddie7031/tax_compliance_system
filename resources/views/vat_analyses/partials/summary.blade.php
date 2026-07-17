<div class="row mt-4">

    <!-- Output VAT -->
    <div class="col-lg-2 col-md-4 col-sm-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>
                    KES {{ number_format($vatAnalysis->output_vat,2) }}
                </h3>

                <p>Output VAT</p>

            </div>

            <div class="icon">
                <i class="fas fa-arrow-up"></i>
            </div>

        </div>

    </div>

    <!-- Input VAT -->
    <div class="col-lg-2 col-md-4 col-sm-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>
                    KES {{ number_format($vatAnalysis->input_vat,2) }}
                </h3>

                <p>Input VAT</p>

            </div>

            <div class="icon">
                <i class="fas fa-arrow-down"></i>
            </div>

        </div>

    </div>

    <!-- VAT Withheld -->
    <div class="col-lg-2 col-md-4 col-sm-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>
                    KES {{ number_format($vatAnalysis->vat_withheld,2) }}
                </h3>

                <p>VAT Withheld</p>

            </div>

            <div class="icon">
                <i class="fas fa-money-check"></i>
            </div>

        </div>

    </div>

    <!-- Credit B/F -->
    <div class="col-lg-2 col-md-4 col-sm-6">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>
                    KES {{ number_format($vatAnalysis->credit_brought_forward,2) }}
                </h3>

                <p>Credit B/F</p>

            </div>

            <div class="icon">
                <i class="fas fa-wallet"></i>
            </div>

        </div>

    </div>

    <!-- Net VAT -->
    <div class="col-lg-2 col-md-4 col-sm-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>
                    KES {{ number_format($vatAnalysis->net_vat,2) }}
                </h3>

                <p>Net VAT</p>

            </div>

            <div class="icon">
                <i class="fas fa-balance-scale"></i>
            </div>

        </div>

    </div>

    <!-- Transactions -->
    <div class="col-lg-2 col-md-4 col-sm-6">

        <div class="small-box bg-secondary">

            <div class="inner">

                <h3>
                {{ $sales->count() + $purchases->count() }}
                </h3>

                <p>Transactions</p>

            </div>

            <div class="icon">
                <i class="fas fa-file-invoice"></i>
            </div>

        </div>

    </div>

</div>