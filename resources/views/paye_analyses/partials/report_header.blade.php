<div class="card mb-4 shadow-sm">

    <div class="card-body">


        {{-- TOP SECTION --}}
        <div class="row align-items-center">


            {{-- LOGO --}}
            <div class="col-md-3 text-center">

                <img src="{{ asset('images/logo.png') }}"
                     class="img-fluid"
                     style="
                     max-height:130px;
                     width:auto;
                     ">

            </div>



            {{-- TITLE --}}
            <div class="col-md-6 text-center">

                <h2 class="font-weight-bold">
                    PAYE WORKING PAPER
                </h2>


                <h5>
                    Payroll Tax Compliance Review
                </h5>


                <p class="mb-0">

                    Period:

                    <strong>
                        {{ $payeAnalysis->period }}
                    </strong>

                </p>



        <hr>



        {{-- CLIENT INFORMATION --}}

        <h5 class="font-weight-bold">

            Client Information

        </h5>



        <div class="row">


            <div class="col-md-6">


                <table class="table table-bordered table-sm">


                    <tr>

                        <th width="35%">
                            Client Name
                        </th>


                        <td>

                            {{ $payeAnalysis->client->company_name }}

                        </td>


                    </tr>



                    <tr>

                        <th>
                            KRA PIN
                        </th>


                        <td>

                            {{ $payeAnalysis->client->kra_pin ?? 'N/A' }}

                        </td>


                    </tr>



                    <tr>

                        <th>
                            Email
                        </th>


                        <td>

                            {{ $payeAnalysis->client->email ?? 'N/A' }}

                        </td>


                    </tr>


                </table>


            </div>



            <div class="col-md-6">


                <table class="table table-bordered table-sm">


                    <tr>

                        <th width="35%">
                            Report Type
                        </th>


                        <td>
                            PAYE Analysis
                        </td>


                    </tr>


                    <tr>

                        <th>
                            Prepared Date
                        </th>


                        <td>

                            {{ now()->format('d/m/Y') }}

                        </td>


                    </tr>


                </table>


            </div>


        </div>



    </div>


</div>
