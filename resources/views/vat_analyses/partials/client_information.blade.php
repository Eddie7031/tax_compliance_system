<div class="card shadow-sm mb-4">

    <div class="card-header bg-primary text-white">

        <h4 class="mb-0">
            <i class="fas fa-building"></i>
            Client Information
        </h4>

    </div>

    <div class="card-body">

        <table class="table table-bordered mb-0">

            <tr>
                <th width="25%">Company</th>
                <td>{{ $vatAnalysis->client->company_name }}</td>
            </tr>

            <tr>
                <th>KRA PIN</th>
                <td>{{ $vatAnalysis->client->pin }}</td>
            </tr>

            <tr>
                <th>VAT Period</th>
                <td>{{ $vatAnalysis->period }}</td>
            </tr>

        </table>

    </div>

</div>