<div class="card shadow-sm border-0 mt-4">

    <div class="card-header bg-white">

        <h5 class="mb-0">

            4. Review & Approval

        </h5>

    </div>

    <div class="card-body">

        <table class="table table-bordered">

            <thead class="table-light">

            <tr>

                <th width="33%">Prepared By</th>

                <th width="33%">Reviewed By</th>

                <th width="34%">Approved By</th>

            </tr>

            </thead>

            <tbody>

            <tr>

                <td style="height:120px; vertical-align:top;">

                    <strong>{{ $vatAnalysis->prepared_by }}</strong>

                    <br><br>

                    Signature: ______________________

                    <br><br>

                    Date:

                    {{ $vatAnalysis->prepared_date }}

                </td>

                <td style="vertical-align:top;">

                    <strong>{{ $vatAnalysis->reviewed_by }}</strong>

                    <br><br>

                    Signature: ______________________

                    <br><br>

                    Date:

                    {{ $vatAnalysis->reviewed_date }}

                </td>

                <td style="vertical-align:top;">

                    <strong>{{ $vatAnalysis->approved_by }}</strong>

                    <br><br>

                    Signature: ______________________

                    <br><br>

                    Date:

                    {{ $vatAnalysis->approved_date }}

                </td>

            </tr>

            </tbody>

        </table>

    </div>

</div>