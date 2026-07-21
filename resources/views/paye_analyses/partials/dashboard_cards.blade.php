<div class="row">

    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-info">

            <div class="inner">

                <h3>{{ $employeeCount ?? 0 }}</h3>

                <p>Employees</p>

            </div>

            <div class="icon">
                <i class="fas fa-users"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-success">

            <div class="inner">

                <h3>KES {{ number_format($grossPayroll ?? 0,2) }}</h3>

                <p>Gross Payroll</p>

            </div>

            <div class="icon">
                <i class="fas fa-money-bill-wave"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-primary">

            <div class="inner">

                <h3>KES {{ number_format($totalPaye ?? 0,2) }}</h3>

                <p>PAYE</p>

            </div>

            <div class="icon">
                <i class="fas fa-file-invoice-dollar"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-warning">

            <div class="inner">

                <h3>KES {{ number_format($totalNssf ?? 0,2) }}</h3>

                <p>NSSF</p>

            </div>

            <div class="icon">
                <i class="fas fa-piggy-bank"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-danger">

            <div class="inner">

                <h3>KES {{ number_format($totalShif ?? 0,2) }}</h3>

                <p>SHIF</p>

            </div>

            <div class="icon">
                <i class="fas fa-heartbeat"></i>
            </div>

        </div>

    </div>


    <div class="col-lg-2 col-md-4 col-6">

        <div class="small-box bg-secondary">

            <div class="inner">

                <h3>KES {{ number_format($netPayroll ?? 0,2) }}</h3>

                <p>Net Payroll</p>

            </div>

            <div class="icon">
                <i class="fas fa-wallet"></i>
            </div>

        </div>

    </div>

</div>
